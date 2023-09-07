<?php
  $errors = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Récupérer les données du formulaire
      $typeRecharge = $_POST["typeRecharge"];
      $montant = $_POST["montant"];
      $codeCoupon = $_POST["codeCoupon"];
      $masquerCodeCoupon = $_POST["masquerCodeCoupon"];
      $email = $_POST["email"];

    // Valider les données du formulaire (vous pouvez ajouter vos propres validations ici)
    // Valider les données du formulaire
    if (empty($typeRecharge)) {
      $errors[] = "Le champ 'Type de recharge' est obligatoire.";
  }

  if (!is_numeric($montant) || $montant <= 0) {
      $errors[] = "Le champ 'Montant' doit être un nombre positif.";
  }

  if (empty($codeCoupon)) {
      $errors[] = "Le champ 'Code de coupon' est obligatoire.";
  }

  if (empty($masquerCodeCoupon)) {
      $errors[] = "Veuillez sélectionner 'OUI' ou 'NON' pour 'Masquer le code de coupon'.";
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "L'adresse e-mail n'est pas valide.";
  }

  // Si aucune erreur n'a été détectée, envoyer l'e-mail
  if (empty($errors)) {
      $to = "ghislainfibi96@gmail.com"; // Remplacez par votre adresse e-mail
      $subject = "Nouvelle demande de recharge";
      $message = "Type de recharge: $typeRecharge\n";
      $message .= "Montant: $montant\n";
      $message .= "Code de coupon: $codeCoupon\n";
      $message .= "Masquer le code de coupon: $masquerCodeCoupon\n";
      $message .= "E-mail de l'utilisateur: $email\n";

      $headers = "From: $email";

      if (mail($to, $subject, $message, $headers)) {
          $confirmation_message = "Votre demande a été envoyée avec succès. Nous vous contacterons bientôt.";
      } else {
          $errors[] = "Une erreur s'est produite lors de l'envoi de votre demande.";
      }
  }
}

// Envoyer l'e-mail
    $to = "votre@email.com"; // Remplacez par votre adresse e-mail
    $subject = "Nouvelle demande de recharge";
    $message = "Type de recharge: $typeRecharge\n";
    $message .= "Montant: $montant\n";
    $message .= "Code de coupon: $codeCoupon\n";
    $message .= "Masquer le code de coupon: $masquerCodeCoupon\n";
    $message .= "E-mail de l'utilisateur: $email\n";

    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre demande a été envoyée avec succès. Nous vous contacterons bientôt.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de votre demande.";
    }

?>
