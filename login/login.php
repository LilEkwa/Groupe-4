<?php
session_start();
include 'config.php';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $email = trim( $_POST[ 'email' ] );
    $password = $_POST[ 'password' ];

    $stmt = $conn->prepare( 'SELECT id, name, password,acctype,authentified FROM all_users WHERE email = ?' );
    $stmt->bind_param( 's', $email );
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result( $id, $name, $hashedPassword, $acctype, $authentified );

    $stmt->fetch();

    if ( $stmt->num_rows > 0 && ( $password == $hashedPassword ) ) {
        if ( $authentified == 'O' ) {
            $_SESSION[ 'user_id' ] = $id;
            $_SESSION[ 'username' ] = $name;
            $_SESSION[ 'acctype' ] = $acctype;
            $_SESSION[ 'success' ] = 'Connexion reussie';
            header( 'Location: ../index.php?status=success' );
        } else {
            $_SESSION[ 'error' ] = 'Vous devez confirmer votre adresse email.';
            header( 'Location: auth.php?status=cverify' );
        }
    } else {
        $_SESSION[ 'error' ] = 'Erreur lors de la connecion.';
        header( 'Location: auth.php?status=error' );
    }

    $stmt->close();
    $conn->close();
}
?>
