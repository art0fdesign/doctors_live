<?php
/**
 * Created by Lemmy.
 * Date: 8/17/12
 * Time: 7:50 PM
 */

// ext is your protected.extensions folder
// gmaps means the subfolder name under your protected.extensions folder
// ?>
<div class="map">

    <?php

        Yii::import('ext.gmaps.*');

        $sw = new EGMapCoord($coords['sW']['lat'], $coords['sW']['long']);
        $ne = new EGMapCoord($coords['nE']['lat'], $coords['nE']['long']);

        $bound = new EGMapBounds($sw, $ne);
        $zoom = $bound->getZoom(min(555, 320), 10);
        //MyFunctions::echoArray($zoom);

        //these are same lat and long like centerLat and $centerLong
        /*
        $centLat = $bound->getCenterLat();
        $centLong = $bound->getCenterLng();
        */
        //MyFunctions::echoArray(array($centLat, $centLong), array($centerLat, $centerLong));

        $gMap = new EGMap();
        $gMap->zoom = $zoom;
        $gMap->width = 555;
        $gMap->height = 320;

        $mapTypeControlOptions = array(
            'position'=> EGMapControlPosition::RIGHT_TOP,
            'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
        );

        $gMap->mapTypeControlOptions= $mapTypeControlOptions;

        $gMap->setCenter($centerLat, $centerLong);


        // Create GMapInfoWindows
        //$info_window_a = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');
        foreach($locations as $location)
        {

            $info_window = new EGMapInfoWindow($location->facility);
            $marker = new EGMapMarkerWithLabel($location->latitude, $location->longitude, array('title' => $location->facility));

            $marker->addHtmlInfoWindow($info_window);

            $gMap->addMarker($marker);

            // enabling marker clusterer just for fun
            // to view it zoom-out the map
            $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());

        }
        $gMap->renderMap();
    ?>
</div>