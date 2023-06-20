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

<!-- note how you can use your gitHub link. Just make a path to your assets folder -->




<!-- CONCEPT PROCESS -->
<!-- Briefly eOpenStacklain your concept ideation process -->
<!-- here you will add things like wireframing, data structure planning, anything that shows your process. You need to include images-->

## Concept Process

I went with a simple and minimalistic UI design as I wanted a dark mode type of design, thus I utilised dark colours. DreamTeam is a website that is there to help users understand the sport of basketball. The process I took for this project was to explore and figure out things on my own so I took an explorative route for this one as I feel it payed of in my experience as a developer



### Wireframes

<!-- ![image8](client/src/Assets/mockups/wireframes.jpg) -->
![image1](src/Assets/Landing%20Page.jpg)
![image2](src/Assets/Comparison%20Page.jpg)
![image3](src/Assets/Timeline%20Page.jpg)

## Development Process

The `Development Process` is the technical implementations and functionality done for the app.

### Implementation Process

- I used `npx create-react app` to create this React project. I implemented component-based development instead of classes. By doing this, I will be able to easily inject and eject components and sub-components into my project, making it refactorable and reusable instead of writing up classes I have to do everytime making it tedious and redundant

- I obeyed the `saas` styling of my project which is slightly different to `scss` as the manner in which indentation has been applied is important and semi-colons are not allowed 

<!-- and used `module.scss` to style each individual component. An id get given to each classname, making the styling super easy -->

- `axios` was implemented so that I can make HTTP requests to the BallDontLie API so that I can dynamically display these datasets on a magic chart called charts.js version 5

<!-- edit, delete and send (CRUD) data to it -->


#### Highlights

stipulated the highlight you experienced with the project

- A very big high point was seeing the data from my backend being populated dynamically in my front-end.
- Fixing all the annoying bugs will always be a plus point
- Handing in the project on time


#### Challenges

stipulated the challenges you faced with the project and why you think you faced it or how you think you'll solve it (if not solved)

- The largest issue I had was manipulating the API data and formatting it to fit with the chart.js datasets
as each player had their own end point, thus I had to create create an array of the IDs I wanted and used a for loop it within the promise whilst adding the baseUrl in the axios request 

- my layout was also an issue but in most places I utilised flex boxes for the main containers in order to fixate the contents within that position on any screen

- Displaying data from my API was also my largest issue but I was able to dynamically display data from the API

- overthinking somethings is my issue

<!-- - Something we unfortunately could not implement because of time restrictions was Amazon's S3 Bucket's, in the end we had to drop it revert back to Multer for image uploading
- A big challenge was the tag handling in the question's portal, with the help of the team, we were able to get it working
- Getting the emailer to work was also a big pain point, but eventually after a lot of trial-and-error we got it working -->

### Future Implementation

<!-- TODO Change this! -->

stipulate functionality and improvements that can be implemented in the future.

- I will ensure to populate data into the UI Card, Polaradarchart and PieChart

- My Front-end needs some work as well

<!-- - We would like to make this a fully responsive website
- We would like to implement dark mode
- Implement Pagination on Questions Page -->

<!-- MOCKUPS -->

## Final Outcome

### Mockups

<!-- TODO Change this -->
![image1] [image1]
![image2][image2]
![image3][image3]
<br>


<!-- VIDEO DEMONSTRATION -->

### Video Demonstration

<!-- TODO Change this -->

<!-- To see a run through of OpenStack, click below: -->

[View Demonstration](https://drive.google.com/file/d/1NPY0j63W65k5T3B4179dxDqmp5iEE_l3/view?usp=sharing)

See the [open issues](https://github.com/Tsebo200/Dream-Team/issues) for a list of proposed features (and known issues).

<!-- AUTHORS -->

## Author
- **Tsebo Ramonyalioa** - [Github](https://github.com/Tsebo200)


<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE` for more information.\

<!-- LICENSE -->

## Contact
**Tsebo Ramonyalioa** - [tsebo.ramonyalioa.an@gmail.com](mailto:tsebo.ramonyalioa.an@gmail.com) - [@inspiration200200](https://www.instagram.com/inspiration__200) 

- **Project Link** - https://github.com/Tsebo200/Dream-Team

<!-- ACKNOWLEDGEMENTS -->

## Acknowledgements

<!-- all resources that you used and Acknowledgements here -->
<!-- TODO Change this -->

- [Stack Overflow](https://stackoverflow.com/)
- [Figma](https://www.figma.com/)
<!-- - [Lecturer](https://github.com/MikeMaynard14) -->
<!-- - [Freepik](https://www.freepik.com) -->
<!-- - [Miro](https://miro.com/?utm_source=google&utm_medium=cpc&utm_campaign=S|GOO|BRN|ZA|EN-EN|Brand|Exact&utm_adgroup=&utm_custom=18259414532&utm_content=620159863882&utm_term=miro&device=c&location=1028971) -->
<!-- - [Mongoose Docs](https://mongoosejs.com/docs/api.html) -->
<!-- - [MockupWorld](https://www.mockupworld.co/) -->
- [Flexy Boxes](https://the-echoplex.net/flexyboxes/)

[image1]: src/Assets/Images/Dashboard.png
[image2]: src/Assets/Images/Compare.png
[image3]: src/Assets/Images/Timeline.png

 <!-- [image1]: client/readme-assets/about-project.png -->
 <!-- [image2]: client/readme-assets/register.jpg -->
<!-- [image3]: client/readme-assets/verify.jpg -->
<!-- [image4]: client/readme-assets/question.jpg
[image5]: client/readme-assets/answer.jpg
[image6]: client/src/Assets/mockups/mockup6.jpg
[image7]: client/src/Assets/mockups/mockup7.jpg
[image8]: client/src/Assets/mockups/wireframes.jpg
[image9]: client/src/Assets/mockups/moodboard.jpg
[image10]: Images/mockup10.jpg
[image11]: Images/mockup2.jpg
[image12]: Images/mockup3.jpg
[image13]: Images/mockup4.jpg
[image14]: client/src/Assets/mockups/mockup8.jpg  -->

<!-- [linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/tsebo-ramonyalioa-2392381b4/
[instagram-shield]: https://img.shields.io/badge/-Instagram-black.svg?style=flat-square&logo=instagram&colorB=555
[instagram-url]: https://www.instagram.com/wiaan.dev/ -->
