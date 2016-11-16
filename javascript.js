/**
 * Created by AaronMcf on 05/10/2016.
 */


function log(name, entryDate, content)      //object
{
    this.logName = name;                    //properties
    this.logContent = content;
    this.logEntryDate = entryDate;
}//function log()



function checkContent(content)              //checking if content is present in text area
{
    return Boolean(content);
}



function createLog()
{
    const PASSWORD_CHECK = "placementlogs";
    var attempt = 3;

    do
    {
        var password = prompt("Password:");
        if(password == null)
        {
            return;
        }
        else
        {
            if (PASSWORD_CHECK == password)
            {
                if (document.getElementById("textarea") == null)
                {
                    alert("Cannot find text box");
                }

                else
                {
                    var title = document.getElementById("logTitle").value,
                        date = document.getElementById("date").value,
                        content = document.getElementById("textarea").value,
                        hasContent = checkContent(content);

                    if (hasContent)
                    {
                        var logEntry = new log(title, date, content);

                        localStorage.setItem(title, JSON.stringify(logEntry));

                        var retrieveLog = JSON.parse(localStorage.getItem(title));
                        document.getElementById("output1").innerText = retrieveLog.logName;
                        document.getElementById("output2").innerText = retrieveLog.logEntryDate;
                        document.getElementById("output3").innerText = retrieveLog.logContent;
                    }

                    else
                    {
                        alert("Oops! No log content has been entered");
                    }
                }
            }

            else
            {
                attempt--;

                if(attempt > 1)
                {
                    alert("Incorrect Password. Please try again.\n(" + attempt + " attempts left)");
                }
                else if(attempt > 0)
                {
                    alert("Incorrect Password. Please try again.\n(" + attempt + " attempt left)");
                }
                else if (attempt == 0)
                {
                    document.getElementById("postEntryBtn").disabled = true;
                    return;
                }
            }
        }

    }while(PASSWORD_CHECK !== password);

}


function timeout()
{
    //document.getElementById("editLogBtn").style.visibility = "visible";
}


function editLog()
{
    const PASSWORD_CHECK = "editlogs";
    var attempt = 3;

    do
    {
        var password = prompt("Password:");
        if(password == null)
        {
            return;
        }
        else
        {
            if (PASSWORD_CHECK == password)
            {
                alert("Click on any paragraph to edit");
                document.getElementById("saveBtn").style.visibility = "visible";    //Modify attributes using DOM
                var edit = document.getElementsByClassName("logEdit");
                var loggedIn = document.cookie = "logged in";

                for(var x= 0; x<edit.length; x++)
                {
                    edit[x].contentEditable = true;
                    document.getElementById("editLogBtn").classList.add("active");
                }
            }
            else
            {
                attempt--;

                if(attempt > 1)
                {
                    alert("Incorrect Password. Please try again.\n(" + attempt + " attempts left)");
                }
                else if(attempt > 0)
                {
                    alert("Incorrect Password. Please try again.\n(" + attempt + " attempt left)");
                }
                else if (attempt == 0)
                {
                    document.getElementById("editLogBtn").style.visibility = "hidden";
                    //window.setTimeout(timeout(), 3000);
                    return;
                }
            }
        }

    }while(PASSWORD_CHECK !== password);
}


function saveChanges()
{
    var prompt = confirm("Are you sure you wish to save changes?");
    if(prompt == null)
    {
        return;
    }
    else
    {
        var xr = new XMLHttpRequest(),
            url = "saveChanges.php",
            text = document.getElementById("editLog9").innerHTML,
            vars = "newText = " + text;

        xr.open("POST", url, true);
        xr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xr.send(vars);
    }

    /*if (prompt == true)
    {


    } else {
        console.log("Else");
    }*/
}


function feedbackCook()
{
    var input = document.getElementsByTagName("input"),
        nameInput = input[0],
        emailInput = input[1],
        nameCookie = document.cookie = nameInput.value,
        emailCookie = document.cookie = emailInput.value;

    console.log("Feedback user name: " + nameCookie);
    console.log("Feedback user email: " + emailCookie);
}


function scroll() {
    console.log("test");
    window.scrollY = document.getElementById("log5").scrollTop;
}

function hideTable()
{
    if(document.getElementById("contentsTable").style.display == 'none')
    {
        document.getElementById("contentsTable").style.display = 'block';
    } else {
        document.getElementById("contentsTable").style.display = 'none';
    }

}

function goBack() {
    window.history.back();
    console.log("Previous");
}


//***** scroll to top button in myLogs.html *****//
jQuery(document).ready(function($)
{
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        $back_to_top = $('.cd-top');

    $(window).scroll(function()
    {
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');

        if( $(this).scrollTop() > offset_opacity )
        {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    $back_to_top.on('click', function(event)
    {
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
});