<doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>sign up page</title>
    </head>
    <body>
    <form name="join" method="post" action="../memberSave.php"> <!--membersave.php 파일로 회원정보저장-->

        <h1>input your information</h1>
        <table border="1">
            <tr>
                <td>id</td>
                <td><input type="text" size="30" name="id"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" size="30" name="email"></td>
            </tr>
            <tr>
                <td>name</td>
                <td><input type="text" size="30" name="name"></td>
            </tr>
            <tr>
                <td>nickname</td>
                <td><input type="text" size="12" maxlength="10" name="nickname"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" size="30" name="password"></td>
            </tr>
        </table>
        <input type=submit value="submit"><input type=reset value="rewrite">


        <input type="button" value="뒤로가기"onclick="javascript:history.go(-1)">
    </form>
    </body>
    </html>