//button links starts here
const button1 = document.getElementById("button1")
const button2 = document.getElementById("button2")
const button3 = document.getElementById("button3")
const button4 = document.getElementById("button4")

button1.addEventListener("click", ()=>{
    location.href = "http://localhost/german-con/generator1.php"
})

button2.addEventListener("click", ()=>{
    location.href = "http://localhost/german-con/generator2.php"
})

button3.addEventListener("click", ()=>{
    location.href = "http://localhost/german-con/generator3.php"
})

button4.addEventListener("click", ()=>{
    location.href = "http://localhost/german-con/generator4.php"
})

// buttons ends here


console.log("hi I am connected");

const search_but = document.getElementById("search-but");
var textArray;

search_but.addEventListener("click", (e)=>{
    const text = document.getElementById("textData").value;
    document.getElementById("hidden-data").value = text;

    e.preventDefault();
    textArray = text.split(" ");
    textArray = textArray.filter(n => n.length > 0);
    console.log(textArray)
    for (const textKey in textArray) {
        console.log(textArray[textKey]);

    }

    const textJson = JSON.stringify(textArray);
//    loading the ajax function
    ajaxLoad(textJson);
    document.location.reload(true);

});

function ajaxLoad(textJson){

    const xhr = new XMLHttpRequest();

    xhr.open("post", "http://localhost/german-con/generator_class.php");
    xhr.setRequestHeader("Content-Type", "Application/json");

    xhr.onload = () => {
        console.log(xhr.responseText);

    }

    xhr.send(textJson);
}

