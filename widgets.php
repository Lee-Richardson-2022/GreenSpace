<?php
include_once('charts.php');

function DelBtn(){ ?>
    <button class="delete-button">&times</button>
<?php } 

function Timeline(){ ?>

<div class="draggable wide" draggable="false" id="timeline">
    <?php DelBtn() ?>
    <p>Timeline</p>
</div> 

<?php } 

function Progress(){ ?>

<div class="draggable" draggable="false" id="progress">
    <?php DelBtn() ?>
    <p>Progress</p>
</div> 

<?php } 

function BarChart(){ ?>

    <div class="draggable wide" draggable="false">
        <?php DelBtn(); ?>
        <div id="barchart">
            <?php chartLegalCompliance('barchart');
            ?>
        </div>
    </div> 

<?php } ?>