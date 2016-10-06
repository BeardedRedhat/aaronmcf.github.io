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

                localStorage.setItem(promptResp, JSON.stringify(logEntry));

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
}

//appendChild -