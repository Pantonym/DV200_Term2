<!-- Project Info -->
<br>

![GitHub repo size](https://img.shields.io/github/repo-size/Pantonym/DV200_Term2?color=lightblue)
![GitHub watchers](https://img.shields.io/github/watchers/Pantonym/DV200_Term2?color=lightblue)
![GitHub language count](https://img.shields.io/github/languages/count/Pantonym/DV200_Term2?color=lightblue)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/Pantonym/DV200_Term2?color=lightblue)

<!-- Name, Number, Subject and Term -->
<h5 align="center" style="padding:0;margin:0;">Nico van Wyk</h5>
<h5 align="center" style="padding:0;margin:0;">Student Number: 221179</h5>
<h6 align="center">DV200 | Term 2</h6>

</br>

<!-- Logo and link to repository -->
<p align="center">
  <a href="https://github.com/Pantonym/DV200_Term2">
    <img src="assets\images\Logo.svg" width="200px">
  </a>
</p>

<!-- Short Description -->
<h3 align="center">VeriCalm: Medical Management Portal</h3>
<p align="center"> This is a database management portal for a medical office, where receptionists can manage appointments, patients, doctors and their own profiles.
    <br>
    <!-- Bug and New Feature Links -->
    <a href="https://github.com/Pantonym/DV200_Term2/issues">Report Bug</a>
    <a href="https://github.com/Pantonym/DV200_Term2/issues">Request Feature</a>
    <br>
</p>

<!-- TABLE OF CONTENTS -->
## Table of Contents

- [Table of Contents](#table-of-contents)
- [About the Project](#about-the-project)
  - [Project Description](#project-description)
  - [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Features and Functionality](#features-and-functionality)
- [Concept Process](#concept-process)
  - [Wireframes](#wireframes)
- [Development Process](#development-process)
  - [Implementation Process](#implementation-process)
    - [Highlights](#highlights)
    - [Challenges](#challenges)
  - [Future Implementation](#future-implementation)
- [Final Outcome](#final-outcome)
  - [Mockups](#mockups)
  - [Video Demonstration](#video-demonstration)
- [Author](#author)
- [License](#license)
- [Contact](#contact)
- [Acknowledgements](#acknowledgements)

<!-- About the Project -->
## About the Project

<!--PROJECT DESCRIPTION-->
### Project Description
VeriCalm is a medical database management portal that allows receptionists to add, update and delete doctor profiles, patient profiles and their own profiles. They can also add, delete and update appointments. The Head Receptionist is the SuperUser, and can therefore edit any entity in the database, whereas Receptionists can only edit their own profiles and the appointments. 

### Built With
* CSS
* JavaScript
* HTML
* PHP
* MySql
* Xampp

<!-- GETTING STARTED -->
## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
For development and testing, the latest version of Xampp is required. The latest version can be downloaded from [Apache Friends](https://www.apachefriends.org/download.html)

### Installation

Here are a couple of ways to clone this repo:

1.  GitHub Desktop </br>
    Enter `https://github.com/Pantonym/DV200_Term2.git` into the URL field and press the `Clone` button.

2.  Clone Repository </br>
    Run the following in the command-line to clone the project:

    ```sh
    git clone https://github.com/Pantonym/DV200_Term2.git
    ```

## Features and Functionality
<!-- CONCEPT PROCESS -->
## Concept Process

I chose a simple and easy-to-understand design because the management portal controls appointments that are directly related to someone's wellbeing. Excessive styling would only distract from the purpose of the portal: medical appointments that are highly important. I used a very light purple as my background colour to give the text better visibility, as well as to compliment the orange used in the logo. It also adds to the light blue I used as my secondary colour, with my main colour being white  to add to the 'medical' feel I wanted to emulate. I included a lot of self study in this project, such as using password hashing and designing my login process before getting feedback on how to improve it.

<!-- Wireframes -->
### Wireframes

![image1](assets\wireframes\Login.png)
![image2](assets\wireframes\Landing.png)
![image3](assets\wireframes\PatientPage.png)
![image4](assets\wireframes\DoctorPage.png)
![image5](assets\wireframes\ReseptionistPage.png)
![image6](assets\wireframes\AddUser.png)

<!-- Development Process -->
## Development Process

The `Development Process` is the technical implementations and functionality done for the portal.

<!-- Implementation -->
### Implementation Process

* I used `MySQL` through `Xampp`to create the database used in this project.

<!-- Highlights -->
#### Highlights

* A great highlight was seeing the code come together; seeing my sql statements actually changing the database from the portal I made
* Problem solving was also very fun, white bugs can be irritating if you don't know where they are coming from, it's always a highlight to implement code that works flawlessly on first try
* Learning PHP was a great highlight as I began to understand how you can sue it to build websites. It definitely compliments my way of thinking more than conventional JavaScript and HTML.

<!-- Challenges -->
<!-- Explain the challenges faced with the project and why you think you faced it or how you think you'll solve it (if not solved), or how you solved it -->
#### Challenges

* The largest issue I had was understanding how to upload an image to the website. I solved it by seeking knowledge from those who understood the language better than I did so i may learn from them. 

* The code I created had a flaw: my register page was not created with universality in mind. I solved this by adding a register page for each of the databases, but I have now learned to create universal pages from the start of my PHP projects. 

* Password Hashing was also a challenge, but I solved it by seeking knowledge from those who understood the language better than I did, learning as they explained how to properly implement the functionality.

* Becoming overwhelmed with tracking every possible situation was also a challenge. For example, to make it easier to implement, I created one php file that changed its output based on several variables. Because of this, there are points where I had to re-orient myself and start reading from the start again to see what I had to change.

<!-- Future Implementation -->
### Future Implementation

* I will remove the needless columns in the database. These columns include: password for non-receptionists and a signed in column, which was deprecated upon implementing $_SESSION compatibility to see the data of which user was signed in. 

* The calendar could be made more interactive, since at this current point the dates are not clickable and it only highlights the current date. Date inputs are therefore delegated to an input type="date" and not the larger, more styled, calendar.

* I would like to add multiple 'pages' to the tables that display all profiles, especially the patients page. These 'pages' would display 1-15 patients each, and therefore make it easier to read once more than 15 patients have been added.

* I would also like to make the website completely responsive

<!-- Final Outcome -->
## Final Outcome
<!-- MOCKUPS -->
### Mockups

![image7](Mockups%20And%20Database/Mockup1.png)
![image8](Mockups%20And%20Database/Mockup2.png)
![image9](Mockups%20And%20Database/Mockup3.png)

<br>

<!-- VIDEO DEMONSTRATION -->
### Video Demonstration

  * Caution: Because this is a Markdown file, this video will have no sound. It must be downloaded to access the sound.
<video src="Mockups And Database\VanWykNico_221179_DV200_Presentation_Video.mp4" controls="controls" style="max-width: 730px;">

[View Demonstration](https://drive.google.com/file/d/184F6lbd4yaS4TS12pho0h7AgWf0kZV1L/view?usp=sharing)

<!-- AUTHORS -->
## Author
* **Nico van Wyk** - [Github](https://github.com/Pantonym)

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- Contact -->
## Contact
**Nico van Wyk** - [221179@virtualwindow.co.za](mailto:221179@virtualwindow.co.za)

* **Project Link** - https://github.com/Pantonym/DV200_Term2

<!-- ACKNOWLEDGEMENTS -->
<!-- all resources that you used and Acknowledgements here -->
## Acknowledgements

* [Lecturer](https://github.com/TsungaiKats)
* [Figma](https://www.figma.com/)
* [W3Schools](https://www.w3schools.com)
* **Industry Professional** - Gerhard Herselman