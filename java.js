/**
 * Created by AaronMcf on 05/10/2016.
 */


function log(name, entryDate, content)
{
    this.logName = name;
    this.logContent = content;
    this.logEntryDate = entryDate;
}


function checkContent(content)
{
    return Boolean(content);
}


function createLog()
{
    if(document.getElementById("form8") == null)
    {
        alert("Cannot find text box");
    }
    else
    {
        var title = document.getElementById("form6").value;
        var date = document.getElementById("form7").value;
        var content = document.getElementById("form8").value;
        var hasContent = checkContent(content);

        if(hasContent)
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