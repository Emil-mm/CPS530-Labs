<!DOCTYPE html>
<html>
    <head>
        <title>Lab10a - Exploring More Development Options</title>
        <!-- http://www.lab10a-asp.somee.com/lab10a.asp -->
        <!-- http://www.lab10a-asp.somee.com/lab10a.asp?bg-color=%23d9fcac -->
        <style>
            * {
				font-family: Verdana, sans-serif;
			}

            body {
                background-color: <% Response.Write(Request.QueryString("bg-color"))%>;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form action method="get">
            <br>
            <label for="bg-color">Choose a Background Color (hex or color name)</label>
            <input type="text" id="bg-color" name="bg-color">
            <input type="submit" value="SUBMIT">
        </form>

        <%
        last_visit = Request.Cookies("last_vist")

        If Not IsNull(provider) Then 
            Response.Write("Your Last Visit Was On " & Request.Cookies("last_vist") & "<br>")
        Else
            Response.Write("This is you First vist<br>")
        End if

        Response.Cookies("last_vist") = Now()
        %>
    </body>
</html>