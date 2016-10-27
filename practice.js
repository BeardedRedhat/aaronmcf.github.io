/**
 * Created by AaronMcf on 05/10/2016.
 */

function log(name, content, entryDate)
{
    this.logName = name;
    this.logContent = content;
    this.logEntryDate = entryDate;
}


function hasTags(content)
{
    if(content.search('<') >= 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function checkContent(content)
{
    return Boolean(content);
}


log.prototype.save = function()
{
    localStorage.setItem(this.logName, JSON.stringify(this));
};


function createLog()
{
    if(document.getElementById("textarea") == null)
    {
        alert("Cannot find text box");
    }
    else
    {
        var content = document.getElementById("textarea").value;
        var hasContent = checkContent(content);

        if(hasContent)
        {
            if(hasTags(content))
            {
                alert("Can't save '<' tags");
            }
            else
            {
                var promptResp = prompt("Please enter your log title:");
                var date = new Date();
                var today = date.getDate();
                var logEntry = new log(promptResp, content, date);

                logEntry.save();

                var retrieveLog = JSON.parse(localStorage.getItem(promptResp));
                document.getElementById("output1").innerText = retrieveLog.logName;
                document.getElementById("output2").innerText = retrieveLog.logEntryDate;
                document.getElementById("output3").innerText = retrieveLog.logContent;
            }
        }
        else
        {
            alert("Error: No content");
        }
    }
}//function createLog



function setImage(image)
{
    image.src='pexels-photo-90807-large.jpg';
}



function resetImage(image)
{
    image.src='pexels-photo-115045-large.jpg';
}



function getLogs()
{
    var values = [];
    var keys = Object.keys(localStorage);
    var i = keys.length;

    /**** do while and while loops ****

    while(i--)
    {
        if(typeof(keys[i]) !== "undefined")
        {
            console.log(localStorage.getItem(keys[i]));
        }
    }//while

    do
    {
        if(typeof(keys[i]) !== "undefined")
        {
            console.log(localStorage.getItem(keys[i]));
        }
    }while(i--);

    *****/


    for(var x=0; x<i; x++)
    {
        if(typeof(keys[x]) !== "undefined")
        {
            values.push(localStorage.getItem(keys[x]));
        }
    }

    console.log(values);

    with(values[0])
    {
        console.log(logName);
    }

}//function getLogs



function getURL(button)
{
    alert(button.id);
    var url = window.location;
    console.log(url);

    if(url.href.includes("myProfile.html"))
    {
        window.location = "login.html";
    }

    switch(button.id)
    {
        case /button1/:
            console.log("This is button 1");
            break;
        case /button2/:
            console.log("This is button 2");
            break;
    }
}

function goBack()
{
    window.history.back();
}



function getBrowser()
{
    alert(navigator.userAgent);
}



function checkUser()
{
    event.preventDefault();
    var form = document.getElementById("userForm");
    var inputs = form.getElementsByTagName("input");
    var usernameInput = inputs[0];
    var passwordInput = inputs[1];

    console.log(inputs);
    console.log(usernameInput.value);
    console.log(passwordInput.value);

    if(usernameInput.value == "aaron" && passwordInput.value == "password")
    {
        var userCookie = document.cookie = usernameInput.value;
        console.log("Username = " + userCookie);
        console.log(document.cookie = "username = " + usernameInput.value);
    }
}

function dom()
{
    document.getElementById("changeText").innerHTML = "Text changed!";
}

function domAttribute()
{
    document.getElementsByTagName("h3")[0].setAttribute("style", "color: red;");
}

function radioOptions()
{
    if(document.getElementById("male").checked)
    {
        alert("You've chosen Male");
    }
    else if(document.getElementById("female").checked)
    {
        alert("You've chosen Female");
    }
}

function selectOptions()
{
    var sel = document.getElementsByTagName("select");
    var option1 = sel[0];
    var option2 = sel[1];
    var option3 = sel[2];

    for(var i=0; i<sel.length; i++)
    {
        if(sel[i] == 0) {
            console.log("Option 1 selected.");
        }
        else if(sel[i] == 1) {
            console.log("Option 2 selected.");
        }
        else {
            console.log("Option 3 selected.");
        }
    }

}


function mathRound()
{
    var number = document.getElementById("number").value;
    var ans = Math.round(number);
    alert(number + " rounded is " + ans);
}
