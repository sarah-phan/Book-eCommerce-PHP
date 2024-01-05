var originalText = ""
function toggleText() {
    var text = document.getElementById("text_content");
    var readMoreBtn = document.getElementById("read_more");

    if (text.dataset.fulltext) {        
        text.innerText = text.innerText.substring(0, 100) + "...";
        text.dataset.fulltext = "";
        readMoreBtn.innerHTML = "Read More";
    } else {
        text.dataset.fulltext = originalText;
        text.innerText = originalText;
        readMoreBtn.innerHTML = "Read Less";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    originalText = document.getElementById("text_content").innerText
    var textElement = document.getElementById("text_content");
    var text = textElement.innerText;

    if (text.length > 100) {
        var truncatedText = text.substring(0, 100);

        // Create a new span element with the desired style
        var dotSpan = document.createElement("span");
        dotSpan.style.color = "#5C084E"; // Set your desired style here

        // Set the ellipsis text within the span
        dotSpan.innerText = "...";

        // Update the element's content with the modified text
        textElement.innerText = truncatedText;

        // Append the span element to the modified text
        textElement.appendChild(dotSpan);
        document.getElementById("read_more").style.display = "inline";
    } else {
        document.getElementById("read_more").style.display = "none";
    }
});