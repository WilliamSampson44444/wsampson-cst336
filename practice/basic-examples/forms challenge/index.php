<!DOCTYPE html>
<html>
    <head>
        <title>Forms Practice</title>
    </head>
    <body>
        <form method="POST">
            <div>
                <!--'for' attribute is tied to 'id' of input, not 'name'-->
                <label for="name">Name:</label> 
                <input type="text" name="name" id="name" />
            </div>
            <div>
                <label for="names">Names:</label>
                <div id="names">
                    <div><input type="radio" name="names[]" value="1" /><input type="text" name="name" id="name" /></div>
                    <div><input type="radio" name="names[]" value="2" /> <input type="text" name="name" id="name" /></div>
                    <div><input type="radio" name="namse[]" value="3" /> <input type="text" name="name" id="name" /></div>
                    <div><input type="radio" name="names[]" value="0" /> <input type="text" name="name" id="name" /></div>
                </div>
            </div>

            <div>
                <input type="submit" value="Save" />
                <button>Save with button</button>
            </div>
        </form>
    </body>
</html>