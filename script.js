
// Get all the links on the page
var navLinks = document.getElementById('nav-links');
var links = navLinks.querySelectorAll('a');
 // Loop through all the links
for (var i = 0; i < links.length; i++) {
  // Check if the href of the link exists in the URL
  if (window.location.href.indexOf(links[i].href) !== -1) {
    // Set the background color of the parent element to red
    links[i].parentNode.style.backgroundColor = '#ccc';
  }
}

// Create an object from JSON at will! print it out
const json = '{"name": "John", "age": 30, "city": "New York"}';
const obj = JSON.parse(json);

console.log(obj);

// Create an object at your own discretion! print it out
class CustomObject {
  constructor() {
    this.name = "ChatGPT";
    this.description = "A friendly AI language model.";
    this.creationYear = 2023;
  }

  toString() {
    return `Name: ${this.name}\nDescription: ${this.description}\nCreation Year: ${this.creationYear}`;
  }
}

const customObject = new CustomObject();
console.log(customObject.toString());
