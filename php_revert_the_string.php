<html>
<body>
<br>

<form name="form" action="" method="get">
    Input some text: <input title="data" name="data" required="" type="text"/>
    <input type="submit" name="button" value="Revert"/><br/>
</form>
</body>
</html>
    <?php
// Create function, which reverts the string.

if (isset($_GET['data'])) {
    $str = $_GET['data'];

    /**
     * Reverting the string
     *
     * @param string $str - string to revert
     * @return string - reverted string
     */
    function revert($str)
    {
        $res = '';
        for ($i = 1; $i <= strlen($str); $i++) {
            $res .= $str[strlen($str) - $i];
        }
        return $res;
    }

    $strReverted = revert($str);
    if ($strReverted == strrev($str)) {
        print_r($strReverted);
    } else {
        echo "achtung!";
    }
}
