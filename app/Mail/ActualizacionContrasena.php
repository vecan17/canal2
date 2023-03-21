<?php
use Illuminate\Mail\Mailable;

class ActualizacionContrasena extends Mailable {
    public $user;
    public $newPassword;

    public function __construct($user, $newPassword) {
        $this->user = $user;
        $this->newPassword = $newPassword;
    }

    public function build() {
        return $this->view('emails.actualizacion_contrasena')
                    ->subject('Actualización de contraseña');
    }
}
