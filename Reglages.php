<?php
/**
 * Plugin Name: Settings Plugin
 * Author: Maimouni
 * Version: 2.0.0
 */
function reglages_plugin()
{
    add_menu_page('Settings','Réglages','manage_options','Amine-admin-menu','form_principale','dashicons-menu-alt3',6);
}
    add_action('admin_menu','reglages_plugin');
 function form_principale()
 {

//Saving data into database & keeping it 
    $radio_btn_Nom = '';   
    $radio_btn_Nom_false = '';   
    $radio_btn_Prenom ='';
    $radio_btn_Prenom_false ='';
    $radio_btn_Date = '';
    $radio_btn_Date_false = '';
    $radio_btn_Email = '';
    $radio_btn_Email_false = '';
    $radio_btn_Numero = '';
    $radio_btn_Numero_false = '';
    $radio_btn_Message = '';
    $radio_btn_Message_false = '';

     if(get_option("radio_btn_Nom") == 'true')
     {
        $radio_btn_Nom = 'checked';
     }
     else
     {
        $radio_btn_Nom_false = 'checked';
     }
     
     if (get_option("radio_btn_Prenom") == 'true')
     {
        $radio_btn_Prenom ='checked';
     }
     else
     {
        $radio_btn_Prenom_false ='checked';

     }
     if (get_option("radio_btn_Date") == 'true')
     {
        $radio_btn_Date = 'checked';
     }
     else
     {
        $radio_btn_Date_false = 'checked';
     }
     if (get_option("radio_btn_Email") == 'true')
     {
        $radio_btn_Email = 'checked';   
     }
     else
     {
        $radio_btn_Email_false = 'checked';
     }
     if (get_option("radio_btn_Numero") == 'true')
     {
        $radio_btn_Numero = 'checked';
     }
     else
     {
        $radio_btn_Numero_false = 'checked';
     }
     if (get_option("radio_btn_Message") == 'true')
     {
        $radio_btn_Message = 'checked';
     }
     else
     {
        $radio_btn_Message_false = 'checked';
     }

   echo '<h1>Réglages</h1>
   <form method="POST" action="">
    <div id="form-group">
       <table>
           <thead>
               <tr>
                   <th>Structure</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                    <td>
                    <label for="">Nom</label><br>
                       <input name="wp_contact_nom"type="text">
                    </td>
                    <td>
                       <input value="true" name="radio_btn_Nom" type="radio" '.$radio_btn_Nom.'>
                       <label for="">Activer</label>
                       <input value="false" name="radio_btn_Nom" type="radio" '.$radio_btn_Nom_false.'>
                       <label for="">Désactiver</label>
                    </td>
               </tr>
               <tr>
                   <td>
                       <label for=""> Prénom</label><br>
                       <input name="wp_contact_prenom"type="text">
                   </td>
                   <td>
                       <input value="true" name="radio_btn_Prenom" type="radio"'.$radio_btn_Prenom.'>
                       <label for="">Activer</label>
                       <input value="false" name="radio_btn_Prenom" type="radio" '.$radio_btn_Prenom_false.'>
                       <label for="">Désactiver</label>
                   </td>
               </tr>
               <tr>
                   <td>
                       <label for=""> Date de naissance</label><br>
                       <input name="wp_contact_date"type="date" name="" id="" >
                   </td>
                   <td>
                       <input value="true" name="radio_btn_Date" type="radio" '.$radio_btn_Date.'>
                       <label for="">Activer</label>
                       <input value="false" name="radio_btn_Date" type="radio"'.$radio_btn_Date_false.'>
                       <label for="">Désactiver</label>
                   </td>
               </tr>
               <tr>
                   <td>
                       <label for=""> E-mail</label><br>
                       <input name="wp_contact_email"type="email">
                   </td>
                   <td>
                       <input value="true" name="radio_btn_Email" type="radio" '.$radio_btn_Email.'>
                       <label for="">Activer</label>
                       <input value="false" name="radio_btn_Email" type="radio"'.$radio_btn_Email_false.'>
                       <label for="">Désactiver</label>
                   </td>
               </tr>
               <tr>
                   <td>
                       <label for=""> Numero du téléphone</label><br>
                       <input name="wp_contact_numero"type="number">
                   </td>
                   <td>
                       <input value="true" name="radio_btn_Numero"type="radio" '.$radio_btn_Numero.'>
                       <label for="">Activer</label>
                       <input value="false" name="radio_btn_Numero"type="radio" '.$radio_btn_Numero_false.'>
                       <label for="">Désactiver</label>
                   </td>
               </tr>
               <tr>
                   <td>
                       <label for="">Message</label><br>
                       <textarea name="wp_contact_message"type="text"></textarea>
                   </td>
                   <td>
                       <input value="true" name="radio_btn_Message" type="radio" '.$radio_btn_Message.'>
                       <label for="">Activer</label>
                       <input value="false" name="radio_btn_Message" type="radio"'.$radio_btn_Message_false.'>
                       <label for="">Désactiver</label>
                   </td>
               </tr>
           </tbody>
       </table>
       <div>
       <input name="submit_btn_name" id="submit_btn_id" type="submit" value="Valider">
       </div>
   </div>
</form>';
}
//Setting submit button to update the values of the radio buttons
    if (isset($_POST['submit_btn_name']))  
    {
                       //option name  | option value
        update_option('radio_btn_Nom',$_POST['radio_btn_Nom']);
        update_option('radio_btn_Prenom',$_POST['radio_btn_Prenom']);
        update_option('radio_btn_Date',$_POST['radio_btn_Date']);
        update_option('radio_btn_Email',$_POST['radio_btn_Email']);
        update_option('radio_btn_Numero',$_POST['radio_btn_Numero']);
        update_option('radio_btn_Message',$_POST['radio_btn_Message']);

        echo '<div class="updated"> The operation was completed successfully!</div>';
        
    }
//Show inputs upon admin selection
function affichage_inputs()
{
    $form = '<form method="POST" action="">';
    if(get_option('radio_btn_Nom') == 'true')
    {
        $form .='<label for="">Nom</label><br>';
        $form .='<input name="wp_contact_nom" type="text">';
    }
    if(get_option('radio_btn_Prenom') == 'true')
    {
        $form .='<br><label for=""> Prénom</label><br>';
        $form .='<input name="wp_contact_prenom" type="text">';
    }
    if(get_option('radio_btn_Date') == 'true')
    {
        $form .='<br><label for="">Date de naissance</label><br>';
        $form .='<input name="wp_contact_date" type="date" name="" id="" >';
    }
    if(get_option('radio_btn_Email') == 'true')
    {
        $form .='<br><label for=""> E-mail</label><br>';
        $form .='<input name="wp_contact_email" type="email">';
    }
    if(get_option('radio_btn_Numero') == 'true')
    {
        $form .='<br><label for=""> Numero du téléphone</label><br>';
        $form .='<input name="wp_contact_numero" type="number">';
    }
    if(get_option('radio_btn_Message') == 'true')
    {
        $form .='<br><label for="">Message</label><br>';
        $form .='<textarea name="wp_contact_message" type="text"></textarea>';
    }
    $form .='</form>';
    echo $form;
}

 add_shortcode('affichage_form','affichage_inputs');
 
   ?>
   <style>
       label
       {
        font-size:20px !important;
        font-weight:bold !important;
        font-family: "Inter var", -apple-system, BlinkMacSystemFont, "Helvetica Neue", Helvetica, sans-serif !important;
       }
       .updated
       {    
        margin-left:13em !important;
        background-color:#cee6d4 !important;

       }
      #submit_btn_id
      {  
        margin-top: 2em;    
        margin-left:20em;
        padding:10px 17px;
        border:none;
        border-radius:10px;
        text-decoration: none;
        background-color:#0d6efd;
        color:#fff;
      }
   </style>
<script>
    
</script>