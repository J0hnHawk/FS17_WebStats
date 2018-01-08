<?php

/*
 * Description: The point-in-polygon algorithm allows you to check if a point is
 * inside a polygon or outside of it.
 * Author: Michaël Niessen (2009)
 * Website: http://AssemblySys.com
 *
 * If you find this script useful, you can show your
 * appreciation by getting Michaël a cup of coffee ;)
 * PayPal: https://www.paypal.me/MichaelNiessen
 *
 * As long as this notice (including author name and details) is included and
 * UNALTERED, this code is licensed under the GNU General Public License version 3:
 * http://www.gnu.org/licenses/gpl.html
 */
class pointLocation
{

    var $pointOnVertex = true;
 // Check if the point sits exactly on one of the vertices?
    function pointLocation()
    {}

    function pointInPolygon($point, $polygon, $pointOnVertex = true)
    {
        $this->pointOnVertex = $pointOnVertex;
        
        // Transform string coordinates into arrays with x and y values
        $point = $this->pointStringToCoordinates($point);
        $vertices = array();
        foreach ($polygon as $vertex) {
            $vertices[] = $this->pointStringToCoordinates($vertex);
        }
        
        // Check if the point sits exactly on a vertex
        if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) {
            return "vertex";
        }
        
        // Check if the point is inside the polygon or on the boundary
        $intersections = 0;
        $vertices_count = count($vertices);
        
        for ($i = 1; $i < $vertices_count; $i ++) {
            $vertex1 = $vertices[$i - 1];
            $vertex2 = $vertices[$i];
            if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
                return "boundary";
            }
            if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) {
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x'];
                if ($xinters == $point['x']) { // Check if point is on the polygon boundary (other than horizontal)
                    return "boundary";
                }
                if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections ++;
                }
            }
        }
        // If the number of edges we passed through is odd, then it's in the polygon.
        if ($intersections % 2 != 0) {
            return "inside";
        } else {
            return "outside";
        }
    }

    function pointOnVertex($point, $vertices)
    {
        foreach ($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }
    }

    function pointStringToCoordinates($pointString)
    {
        $coordinates = explode(" ", $pointString);
        return array(
            "x" => $coordinates[0],
            "y" => $coordinates[1]
        );
    }
}

/*
 * EXAMPLE
 * 
 * $pointLocation = new pointLocation();
 * $points = array("50 70","70 40","-20 30","100 10","-10 -10","40 -20","110 -20");
 * $polygon = array("-50 30","50 70","100 50","80 10","110 -10","110 -30","-20 -50","-30 -40","10 -10","-10 10","-30 -20","-50 30");
 * // The last point's coordinates must be the same as the first one's, to "close the loop"
 * foreach($points as $key => $point) {
 *     echo "point " . ($key+1) . " ($point): " . $pointLocation->pointInPolygon($point, $polygon) . "<br>";
 * }
 */
?>