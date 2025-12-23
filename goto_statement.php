<?php

echo "a <br/>";
echo "b <br/>";
echo "c <br/>";
echo "d <br/>";
goto abc;
echo "e <br/>";
echo "f <br/>";
echo "g <br/>";
echo "h <br/>";
echo "i <br/>";
echo "j <br/>";
echo "k <br/>";

abc: // Do not define this name above goto statement otherwise it would result in infinite loop
echo "l <br/>";
echo "m <br/>";
echo "n <br/>";