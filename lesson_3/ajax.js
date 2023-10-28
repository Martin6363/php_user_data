const numberDiv = document.getElementById("sortedNumbers");
const inputSubmit = document.querySelectorAll('input[name="action"]');
const form = document.querySelector("form");
let actionSubmit = 'Default numbers';


inputSubmit.forEach(function (button) {
    button.addEventListener("click", function () {
        actionSubmit = button.value;
        getSortedNumbers(actionSubmit);
        console.log(actionSubmit);
    });
});

getSortedNumbers()

function getSortedNumbers(sorting) {
    let xhttp = new XMLHttpRequest();
    let url = "server.php?action=" + sorting;
    xhttp.open("GET", url);

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            let response = JSON.parse(xhttp.responseText);
            console.log(response);
            displaySortedNumbers(response);
        }
    };
    xhttp.send();
}

function displaySortedNumbers(numbers) {
    numberDiv.innerHTML = "<h2>Sorted Numbers</h2><div id='numberList'></div>";
    const numberList = document.getElementById("numberList");
    const actionText = document.createElement("p");
    
    numbers?.forEach(function (number) {
        const span = document.createElement("span");
        span.textContent = number;
        span.classList.add("number");
        numberList.appendChild(span);
    })

    actionText.innerHTML = "<b>" + actionSubmit + "</b>";
    numberDiv.insertBefore(actionText, numberList);
}

form.addEventListener("submit", function (e) {
    e.preventDefault();
});