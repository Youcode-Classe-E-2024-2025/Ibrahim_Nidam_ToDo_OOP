# Ibrahim_Nidam_ToDo_OOP

**TaskFlow - Application web simple de gestion de tâches**

**Author du Brief:** Iliass RAIHANI.

**Author:** Ibrahim Nidam.

## Links

- **GitHub Repository :** [View on GitHub](https://github.com/Youcode-Classe-E-2024-2025/Ibrahim_Nidam_ToDo_OOP.git)
- **UML Link :** [View UML](https://lucid.app/lucidchart/48ba8c63-7fa2-4501-a7ba-750a67a41b1d/edit?viewport_loc=-2485%2C-550%2C3840%2C1692%2C0_0&invitationId=inv_04f160c4-8229-4a94-9574-5f8ea0de382f)

### créé : 24/12/24

TaskFlow est un projet d'initiation à la Programmation Orientée Objet (POO) à travers la création d'un gestionnaire de tâches simple. Les étudiants apprendront l'encapsulation et l'héritage en créant différents types de tâches (basique, bug, feature) avec une interface web simple. Ce projet met l'accent sur la pratique des fondamentaux de la POO plutôt que sur des fonctionnalités complexes.


# Configuration et Exécution du Projet

### Prérequis
* **Node.js** et **npm** installés (téléchargez [Node.js](https://nodejs.org/)).
* **Laragon** installé (téléchargez [Laragon](https://laragon.org/download/)).

### Étapes d’installation

1. **Cloner le projet** :
   - Ouvrir un terminal et exécuter :  
     `git clone https://github.com/Youcode-Classe-E-2024-2025/Ibrahim_Nidam_ToDo_OOP.git`

2. **Placer le projet dans le dossier Laragon** :
   - Cliquez sur le bouton **Root** dans Laragon pour ouvrir le dossier `www` (par défaut, `C:\laragon\www`).
   - Le chemin de votre projet devrait être `C:\laragon\www\Ibrahim_Nidam_ToDo_OOP`.

3. **Configurer la base de données** :
   - Faites un click droit sur **Laragon**, puis allez dans **Tools** > **Quick Add** et téléchargez **phpMyAdmin** et **MySQL**.
   - Ouvrir **phpMyAdmin** via Laragon :
     - Dans Laragon, cliquez sur le bouton **Database** pour accéder à phpMyAdmin (username = `root` et mode de passe est vide).
     - La base de données est automatiquement créez ou vous pouvez Créez une base de données `taskflow_db` et importez le fichier `script.sql` (disponible dans le dossier `/database/`).


4. **Installer les dépendances Node.js** :
   - Ouvrez un terminal dans le dossier du projet cloné.
   - Exécutez :  `npm install` or `npm i`

5. **Configurer Laragon pour le serveur local** :
   - Lancez **Laragon** et démarrez les services **Apache** et **MySQL**,en Clickant sur **Start All**.


6. **Exécuter le projet** :
   - Une fois les services lancés dans Laragon, cliquez sur le bouton **Web** pour accéder à `http://localhost/Ibrahim_Nidam_ToDo_OOP` dans votre navigateur.



## **Contexte du projet:**

En tant que développeur junior, vous êtes chargé de créer "TaskFlow", une application web simple de gestion de tâches. Ce projet vous permettra d'apprendre les bases de la POO.

​

### Fonctionnalités principales

​

Gestion des Tâches :

    Création de tâches basiques
    Création de tâches spécifiques (Bug, Feature)
    Changement de statut des tâches
    Attribution à un utilisateur

​

Interface Simple :

​

    Liste des tâches
    Formulaire de création
    Page de détail d'une tâche
    Vue des tâches par utilisateur

​

User Stories

​

En tant qu'utilisateur :

    Je veux pouvoir créer une tâche simple
    Je veux pouvoir créer un bug ou une feature
    Je veux pouvoir changer le statut d'une tâche
    Je veux voir mes tâches assignées

​

En tant que développeur :

    Je dois utiliser l'encapsulation (private, getters/setters)
    Je dois utiliser l'héritage pour les types de tâches
    Je dois créer un diagramme de classes basique
    Je dois valider les données




## **Modalités pédagogiques**

    Travail: Individuel
    Durée: 4 jours





## **Modalités d'évaluation**

    Vous présenterez votre travail pendant 15 minutes : 
    - 5 minutes : Démonstration du code
    - 10 minutes : Q/A

## **Livrables**

    - Diagramme de classes UML
    - Code source PHP
    - Interface web simple
    - Documentation basique

## **Critères de performance**

    POO (50%) :

    - Encapsulation correcte
    - Héritage fonctionnel
    - Validation des données
    - Classes bien structurées


    Interface (30%) :

    - CRUD fonctionnel
    - Formulaires basiques
    - Navigation simple


    Code (20%) :

    - Code lisible
    - Fichiers organisés
    - Documentation basique
