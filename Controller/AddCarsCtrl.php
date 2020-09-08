<?php

$title = 'ajout d\' un véhicules';
$formError = array();
$Error = array();
$Success = array();
$regexId = '/^\d+$/';
$AddCar = new cars();
if (isset($_POST['AddCars'])) {
    if (!empty($_POST['Occupying'])) {
        if (preg_match($regexId, $_POST['Occupying'])) {
            if ($_POST['Occupying'] <= 2 && $_POST['Occupying'] > 0) {
                $AddCar->NomberOfOccupant = htmlspecialchars($_POST['Occupying']);
            } else {
                $formError['Occupying'] = 'Vous devez au maximun avoir un copilote et un pilote dans la voiture de course!';
            }
        } else {
            $formError['Occupying'] = 'vous devez mettre que des chiffres dans ce champ';
        }
    } else {
        $formError['Occupying'] = 'Vous avez oublié de remplir le champ ci-dessous!!';
    }
    if (!empty($_POST['Mark'])) {
        $AddCar->Mark = htmlspecialchars($_POST['Mark']);
    } else {
        $formError['Mark'] = 'Vous avez oublié de remplir le champ ci-dessous!!!';
    }

    if (!empty($_POST['Model'])) {
        $AddCar->Model = htmlspecialchars($_POST['Model']);
    } else {
        $formError['Model'] = 'Vous avez oublié de remplir le champ ci-dessous!!';
    }
    if (!empty($_POST['Category'])) {
        $AddCar->Category = htmlspecialchars($_POST['Category']);
    } else {
        $formError['Category'] = 'Vous avez oublié de remplir le champ ci-dessous!!';
    }
    if (!empty($_POST['Classroom'])) {
        $AddCar->Classroom = htmlspecialchars($_POST['Classroom']);
    } else {
        $formError['Classroom'] = 'Vous avez oublié de remplir le champ ci-dessous!!';
    }
    if (isset($_SESSION['idUser'])) {
        if (preg_match($regexId, $_SESSION['idUser'])) {
            $AddCar->id_0108ASAP_membres = htmlspecialchars($_SESSION['idUser']);
        } else {
            $$Error['Session'] = 'Vous n\'est pas reconnu comme utilisateur ';
        }
    } else {
        $$Error['Session'] = 'Une erreur importante est arrivée, contacter le webMaster via le mail dev.gaetan.jonard@outlook.fr  sujet addCars';
    }
    if (count($formError) == 0) {
        if (count($Error) == 0) {
            $CheckAddCars = $AddCar->AddCars();
            if ($CheckAddCars == true) {
             $Success['AddCars']='Votre voiture a bien été ajoutée!';   
            } else {
                $Error['Error']='Une erreur importante est arrivée contacter le webMaster via le mail dev.gaetan.jonard@outlook.fr  sujet addCars';
            }
        } else {
            $Error['Error'] = 'Vous avez des erreurs dans le formulaire';
        }
    } else {
        $Error['Error'] = 'Vous avez des erreurs dans le formulaire';
    }
}

