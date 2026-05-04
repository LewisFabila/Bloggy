<?php

namespace App\Controllers;

use App\Models\Posts; // Tomamos el modelo "Posts".

class Blog extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del blog.
    {
        if (!session()->get('email')) { // En caso de cerrar sesion e intentar volver a la vista, pide volver a iniciar sesion.
            return redirect()->to(base_url('/'))
            ->with('message','La sesion ha concluido. Por favor vuelve a iniciar sesion.')
            ->with('type','warning');
        }

        helper('post-time'); // Incluye el "Helper" para saber hace cuanto tiempo se hizo "x" publicacion.

        $postModel = new Posts(); // Instancia con el modelo "Posts".

        $posts = $postModel
            ->select('posts.*,users.user')
            ->join('users','users.id_user = posts.id_user')
            ->orderBy('posts.created_at','DESC')
            ->findAll();

        $message = session('message'); // Una instancia almacena los mensajes para mostrarlos (En caso de que haya recibido alguno).
        
        return view('blog_view',[ // Retorna la vista del blog con los mensajes y los posts que existan.
            'message'=>$message,
            'title'=>'Inicio - Bloggy',
            'posts' => $posts,
        ]);
    }

    public function logout() // Destruye la session y regresa la vista del login.
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function storePost() // Funcion para publicar un post.
    {
        if(!$this->validate([ // Validacion de los datos de publicacion para que cumplan las condiciones.
            'title' => [
                'label' => 'titulo', // Campos label para que los mensajes de error digan "titulo" y no "title".
                'rules' => 'required|min_length[5]',
            ],
            'content' => [
                'label' => 'contenido',
                'rules' => 'required|min_length[10]',
            ],
            'image' => [
                'label' => 'imagen',
                'rules' => 'permit_empty|is_image[image]|max_size[image,2048]',
            ],
        ])) {
            return redirect()->back()->withInput() // Redirige al blog y muestra los mensajes de error.
                ->with('validation', $this->validator)
                ->with('message', $this->validator->getErrors()) // Obtenemos los errores.
                ->with('type', 'danger');
            }

        $session = session();
        $userId = $session->get('id_user'); // Obtenemos el id del usuario para la ruta de imagenes.

        $file = $this->request->getFile('image'); // Instancia para obtener la "imagen" para validacion.
        $imagePath = null; // En caso de ser una publicacion sin imagen.

        if ($file && $file->isValid() && !$file->hasMoved()) { // Validacion para comprobar que la imagen subida sea una imagen realmente.
            
            $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp']; // Arreglo con las extensiones de imagen permitidas.
            if (!in_array($file->getMimeType(), $allowedExtensions)) { // Si la extension no coincide con una de imagen, retrocede y manda el mensaje de error.
                return redirect()->back()
                    ->withInput()
                    ->with('message', 'Solo se permiten imágenes')
                    ->with('type', 'danger');
            }

            $uploadPath = FCPATH . 'uploads/' . $userId; // Se establece una ruta basada en el id de usuario.

            if (!is_dir($uploadPath)) { // Verifica la existencia de una carpeta del usuario, si no tiene la crea.
                mkdir($uploadPath, 0777, true); // Crea carpetas recursivamente.
            }

            $imageName = $file->getRandomName(); // Las imagenes obtienen un nombre aleatorio al almacenarse.
            $file->move($uploadPath, $imageName); // Se mueve el archivo a la ruta correspondiente.
            $imagePath = $userId . '/' . $imageName; // Ruta relativa.
        }

        $postModel = new Posts(); // Instancia con el modelo "Posts".

        $postModel->insert([
            'id_user' => session('id_user'),
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $imagePath, // Almacena toda la ruta de la imagen en la DB.
        ]);

        return redirect()->back() // Al final nos regresa (por si estabas en "Mis Publicaciones"), y manda mensaje de exito.
            ->with('message', 'Publicación creada.')
            ->with('type', 'success');
    }

    public function myPosts() // Funcion para filtrar posts propios.
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/')
                ->with('message', 'Debes iniciar sesión.')
                ->with('type', 'warning');
        }

        helper('post-time');

        $postModel = new Posts(); // Instancia con el modelo "Posts".

        $posts = $postModel 
            ->select('posts.*, users.user')
            ->join('users','users.id_user = posts.id_user')
            ->where('posts.id_user', session('id_user'))
            ->orderBy('posts.created_at','DESC')
            ->findAll();

        return view('blog_view', [
            'posts' => $posts,
            'title' => 'Mis publicaciones'
        ]);
    }

    public function deletePost() // Funcion para eliminar publicaciones.
    {
        $postId = $this->request->getPost('id'); // Obtenemos el "id" del Post
        if (!$postId) { // Si algo sale mal, regresa y manda mensaje de error.
            return redirect()->back()
                ->with('message', 'Publicacion no válida.')
                ->with('type', 'danger');
        }
        
        $postModel = new Posts(); // Instancia con el modelo "Posts".
        $post = $postModel->find($postId);

        if (!$post) { // Si el post ya no existe, regresa y manda mensaje de error.
            return redirect()->back()
                ->with('message', 'La publicacion no existe.')
                ->with('type', 'danger');
        }

        if ($post['id_user'] != session('id_user')) { // Se valida que el usuario del post coincida con el de la sesion para la eliminacion.
            return redirect()->back()
                ->with('message', 'No tienes permiso para eliminar esta publicacion.')
                ->with('type', 'danger');
        }

        if (!empty($post['image'])) { // Si existe una imagen en el post, la elimina del almacenamiento.
            $imagePath = FCPATH . 'uploads/' . $post['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $postModel->delete($postId); // Se elimina el registro de la DB.
        return redirect()->back() // Al final nos regresa (por si estabas en "Mis Publicaciones"), y manda mensaje de exito.
            ->with('message', 'Publicación eliminada correctamente.')
            ->with('type', 'success');
    }

    public function updatePost() // Funcion para editar publicaciones.
    {
        $postId = $this->request->getPost('id'); // Almacenamos el id del post.

        $postModel = new Posts(); // Instancia con el modelo "Posts".
        $post = $postModel->find($postId);

        if (!$post) { // Si algo sale mal, regresa y manda mensaje de error.
            return redirect()->back()->with('message', 'La publicacion no existe')->with('type', 'danger');
        }

        if ($post['id_user'] != session('id_user')) { // Se valida que el usuario del post coincida con el de la sesion para la edicion.
            return redirect()->back()->with('message', 'Accion no autorizada')->with('type', 'danger');
        }

        $data = [ // Se obtiene el titulo y el contenido actualizados.
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        $file = $this->request->getFile('image'); // Obtenemos el archivo (si es que se subio).
        $removeImage = $this->request->getPost('remove_image'); // Obtenemos el checkbox (si es que se marco).

        $userId = session('id_user'); // Obtenemos el id del usuario de la sesion.
        $uploadPath = FCPATH . 'uploads/' . $userId; // Obtenemos la ruta de almacenamiento de imagenes del usuario.

        if (!is_dir($uploadPath)) { // Verifica la existencia de una carpeta del usuario, si no tiene la crea.
            mkdir($uploadPath, 0777, true); // Crea carpetas recursivamente.
        }

        if ($removeImage && !empty($post['image'])) { // Elimina la imagen del almacenamiento y de la DB si se marco el checkbox.
            $oldPath = FCPATH . 'uploads/' . $post['image'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            $data['image'] = null;
        }

        if ($file && $file->isValid() && !$file->hasMoved()) { // Elimina la imagen anterior y la reemplaza (si es que existia).
            if (!empty($post['image'])) {
                $oldPath = FCPATH . 'uploads/' . $post['image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $imageName = $file->getRandomName(); // Las imagenes obtienen un nombre aleatorio al almacenarse.
            $file->move($uploadPath, $imageName); // Se mueve el archivo a la ruta correspondiente.
            $data['image'] = $userId . '/' . $imageName; // Ruta relativa.
        }

        $postModel->update($postId, $data); // Se actualiza el registro de la DB.
        return redirect()->back() // Al final nos regresa (por si estabas en "Mis Publicaciones"), y manda mensaje de exito.
            ->with('message', 'Publicación actualizada correctamente.')
            ->with('type', 'success');
    }
}