  <!-- Contact -->
  <?php 
// if(isset($_POST['submit'])){
//     $to = "allan.mont34@gmail.com"; // mail qui reçoit
//     $from = $_POST['Email']; // l'email de l'envoyeur
//     $name = $_POST['Name'];
//     $subject = $_POST['Subject'];
//     $message = "• Vous avez reçu un message depuis le formulaire:"."\n"."• Nom : ". $name ."\n"."• Mail : ". $from ."\n"."• Sujet : ". $subject ."\n"."• Message : ". $_POST['message'];
//     $headers = "From:" . "noreply@portfolioallan.fr";
//     mail($to,$subject,$message,$headers);
//     }
?> 


  <div class="vg-page page-contact" id="contact">
      <div class="container">
          <div class="text-center wow fadeInUp">
              <div class="badge badge-subhead">Contact</div>
          </div>
          <h1 class="text-center fw-normal wow fadeInUp">Contactez-moi</h1>
          <div class="row post-grid py-5">
              <div class="col-lg-5" style="padding-top:40px;">
                  <card>
                      <div class="badge-base LI-profile-badge" data-locale="fr_FR" data-size="large" data-theme="light"
                          data-type="HORIZONTAL" data-vanity="allan-mont" data-version="v1">
                          <a class="badge-base__link LI-simple-link"
                              href="https://fr.linkedin.com/in/allan-mont?trk=profile-badge">
                          </a>
                  </card>
              </div>
          </div>
          <div class="col-lg-5">
              <card>
                  <form class="vg-contact-form php-email-from" method="post" role="form" action="application/vues/partie_admin/mail.php">
                      <div class="form-row">
                          <div class="col-12 mt-3 wow fadeInUp">
                              <input class="form-control" type="text" name="Name" placeholder="Votre nom">
                          </div>
                          <div class="col-6 mt-3 wow fadeInUp">
                              <input class="form-control" type="text" name="Email" placeholder="Adresse Mail">
                          </div>
                          <div class="col-6 mt-3 wow fadeInUp">
                              <input class="form-control" type="text" name="Subject" placeholder="Objet">
                          </div>
                          <div class="col-12 mt-3 wow fadeInUp">
                              <textarea class="form-control" name="Message" rows="6"
                                  placeholder="Entrez votre message ici.."></textarea>
                          </div>
                          <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Envoyer le message</button>
                      </div>
                  </form>
              </card>
          </div>
      </div>
  </div>
  </div>
  <!-- End Contact -->