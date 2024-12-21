# YouCodeJobApp
## Job Dating Manager

### 📋 Contexte du Projet
**Job Dating Manager** est une application web conçue pour répondre aux besoins de gestion des annonces de Job Dating au sein de YouCode. Ce projet vise à offrir une plateforme intuitive permettant aux administrateurs de gérer efficacement les annonces et entreprises partenaires tout en permettant aux apprenants d'accéder facilement aux informations liées aux événements.

### 🎯 Objectif Principal
L'objectif principal est de développer une application web intuitive pour :
- Gérer les annonces de Job Dating (création, édition, suppression).
- Gérer les entreprises partenaires.
- Offrir une interface utilisateur claire pour la visualisation des annonces.

### 🚀 Fonctionnalités Clés
#### 🛠 Gestion des Annonces
- **Création d'annonces** de Job Dating avec des détails comme le titre, la description, la date et l'entreprise associée.
- **Modification et suppression** d'annonces existantes.
- **Soft Deletes** : possibilité de restaurer les annonces supprimées (fonctionnalité bonus).

#### 🏢 Gestion des Entreprises
- **Ajout d'entreprises partenaires** avec leurs informations détaillées.
- **Édition et suppression** des entreprises existantes.

#### 🔒 Gestion des Administrateurs
- **Authentification sécurisée** pour accéder à l'application.

#### 👨‍🎓 Visualisation des Annonces
- Interface claire pour permettre aux apprenants de consulter les annonces disponibles.

---

### 📂 Modèle de Données (Base de Données)
Les tables principales de la base de données incluent :
- **users** : gestion des administrateurs.
- **companies** : gestion des entreprises partenaires.
- **announcements** : gestion des annonces de Job Dating.

---

### 🛠 Technologies Utilisées
- **Backend :** Laravel (PHP Framework).
- **Frontend :** Blade (moteur de templates Laravel), HTML, CSS, JavaScript.
- **Base de Données :** MySQL.
- **Authentification :** Laravel UI Auth ou un package similaire.

### 📦 Installation et Déploiement
#### Prérequis :
- **PHP** : Version 7.4 ou supérieure.
- **Composer** : Gestionnaire de dépendances PHP.
- **MySQL** : Base de données relationnelle.
- **Serveur local** : Laragon.

#### Étapes :
1. **Cloner le projet** :
   ```bash
   git clone https://github.com/CHERKAOUIfatimazahra/YouCodeJobApp.git
