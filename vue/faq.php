<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
 $(document).ready(function() {

    $('.faq_question').click(function() {

        if ($(this).parent().is('.open')){
            $(this).closest('.faq').find('.faq_answer_container').animate({'height':'0'},500);
            //$(this).closest('.faq').removeClass('open');

            }else{
                var newHeight =$(this).closest('.faq').find('.faq_answer').height() +'px';
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':newHeight},500);
                $(this).closest('.faq').addClass('open');
                //$(this).closest('.faq').removeClass('open');
            }

    });

});
</script>
<div class="faq_container">
  <div class="ligne">
      <div class="col-gauche">
           <div class="faq">
              <div class="faq_question"><strong>Question1 : Que permet l'application web ? </strong><br/></div>
                   <div class="faq_answer_container">
                      <div class="faq_answer">Elle vous permet de piloter l'arrosage dans vos maisons. Il est possible de gérer l'arrosage en mettant en place des programmations à différentes périodes de la journée ou du mois. Vous pouvez aussi choisir d'actionner un arroseur volontairement.
                      <br/>Un autre point important est qu'elle permet de gérer différents types d'arrosage (Pour un jardin, pour un vase ou il faut injecter seulement une petite quantité d'eau)</div>
                   </div>
            </div>
            <div class="faq">
               <div class="faq_question"><strong>Question 2: Comment s'inscrire</strong></div>
                    <div class="faq_answer_container">
                       <div class="faq_answer">Pour vous inscrire, rendez-vous sur la page d'accueil et populez les champs présents. Pensez à bien choisir le type d'acteur que vous êtes, car en fonction de ceci; les droits ne seront pas les même.</div>
                    </div>
             </div>
             <div class="faq">
                <div class="faq_question"><strong>Question 3: Qui peut y accéder ?</strong></div>
                     <div class="faq_answer_container">
                        <div class="faq_answer">Cette application sert à plusieurs personnes:
                      <ul>
                        <li> <strong>Le client :</strong> Celui qui peut piloter son arrosage comme epxliqué à la Question 1 </li>
                        <li> <strong>La mairie :</strong> Membre du communauté administratif de la commune, vous souhaitez notifier les utilisateurs et les aider à gérer leur consommation en eau. Vous pourrez envoyer des messages pour les avertir. </li>
                        <li> <strong>Le commercial :</strong> Le commercial pourra avoir accès à des statistiques du nombre d'inscription, de souscriptions aux abonnements en fonction de différentes zones géographique ou de périodes temporelles. </li>
                        <li> <strong>Le Technicien :</strong> Reçoit des demandes clients et peut, sur son planning, planifier des tâches. </li>
                      </ul>
                        </div>
                     </div>
              </div>
              <div class="faq">
                 <div class="faq_question"><strong>Question 4: Vos données sont-elles personnelles? Qui peut y avoir accès?</strong></div>
                      <div class="faq_answer_container">
                         <div class="faq_answer">Quelles sont les données  :
                           <br/>Les données sont personnelles, seules certaiens données comme les adresses, ou la consommation peuvent être accessible. Autrement, les données sensibles ne sont pas transmises.</div>
                      </div>
               </div>
        </div>
        <div class="col-droite">
             <div class="faq">
                <div class="faq_question"><strong>Question 5: Quelles sont vos fonctionnalités ?</strong></div>
                     <div class="faq_answer_container">
                        <div class="faq_answer">Les fonctionnalités clients sont les suivantes: </div>
                     </div>
              </div>
              <div class="faq">
                 <div class="faq_question"><strong>Question 6: En cas d'incident que devons-nous faire ?</strong></div>
                      <div class="faq_answer_container">
                         <div class="faq_answer"> rep</div>
                      </div>
               </div>
               <div class="faq">
                  <div class="faq_question"><strong>Question 7: </strong></div>
                       <div class="faq_answer_container">
                          <div class="faq_answer">P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                       </div>
                </div>
                <div class="faq">
                   <div class="faq_question"><strong>Question 8: </strong></div>
                        <div class="faq_answer_container">
                           <div class="faq_answer">P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        </div>
                 </div>
          </div>
      </div>
</div>
