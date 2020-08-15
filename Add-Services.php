<?php
define('Login_Check', TRUE);
require_once './DB/check_login.php';
?>

<?php
define('DB_Conn', TRUE);
require_once 'DB/DBConn.php';

define('Function', TRUE);
require_once 'DB/Function.php';

$id = $_GET["id"];
$id = check_var($id);

$tb = $_GET["tb"];
$tb = check_var($tb);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once './Links.php'; ?>
    </head> 

    <body class="sticky-header left-side-collapsed"  onload="initMap()">
        <section>
            <!-- left side start-->
            <?php require_once './LeftBar.php'; ?>
            <!-- left side end-->

            <!-- main content start-->
            <div class="main-content">
                <!-- header-starts -->
                <?php require_once './Header.php'; ?>
                <!-- //header-ends -->
                <div id="page-wrapper">
                    <div class="graphs">
                        <?php
                        if (isset($_GET["sucess"])) {
                            ?>
                            <div class="alert-hide alert alert-success auto-hide" role="alert">
                                <strong>Well done!</strong> You successfully affect data.
                            </div>
                            <?php
                        }
                        ?>
                        <div class="bs-example5" data-example-id="default-media">
                            <h3 class="blank1">Engineering DCS Register<a href="Services.php"><button style="float: right;" type="button" class="btn btn-warning warning_22"><i class="fa fa-arrow-left"></i> &nbsp; View </button></a></h3>
                            <?php
                            if (isset($id) AND $id != "" AND isset($tb) AND $tb != "") {
                                $query = "SELECT * FROM `$tb` WHERE id = '$id'";
                                $result = $conn->prepare($query);
                                $result->execute();
                                $row = $result->fetch();
                                $RowCount = $result->rowCount();
                            } else {
                                $RowCount = 0;
                            }
                            ?>
                            <form class="form-horizontal" method="POST" action="<?php
                            if ($RowCount > 0) {
                                echo 'php/Update-Services.php';
                            } else {
                                echo 'php/Services.php';
                            }
                            ?>" enctype="multipart/form-data">
                                 
				<div class="form-group">
                                    <label class="control-label">Department:</label>
                                    <br>
                                     <select name="department">
                                    <?php
                                    $stmt = $conn->query("SELECT depts FROM departments");
                                    //$stmt = $pdo->execute();
                                    while ($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row1['depts'] . "'>" . $row1['depts'] . "</option>";
                                    }
                                    ?>
                                    </select>
                                
                                </div>                 
                                <div class="form-group">
                                    <label class="control-label">Area/Machine:</label><br>
                                    <select name="arealmachine">
                                             <option value="Air plant">Air plant</option>
                                                <option value="BMF">BMF</option>
                                                <option value="Boiler">Boiler</option>
                                                <option value="Bottle  Washer">Bottle  Washer</option>
                                                <option value="Bottle Filler">Bottle Filler</option>
                                                <option value="Brew caustic room">Brew caustic room</option>
                                                <option value="Brewery">Brewery</option>
                                                <option value="Brewhouse">Brewhouse</option>
                                                <option value="Btl washer">Btl washer</option>
                                                <option value="Btl/Can Filter">Btl/Can Filter</option>
                                                <option value="CaCl2 room">CaCl2 room</option>
                                                <option value="Can Blower">Can Blower</option>
                                                <option value="Can Filler">Can Filler</option>
                                                <option value="Caustic make up room">Caustic make up room</option>
                                                <option value="cellar">cellar</option>
                                                <option value="Cellar CIP">Cellar CIP</option>
                                                <option value="Checkmat1">Checkmat1</option>
                                                <option value="Chemical room">Chemical room</option>
                                                <option value="Chemical store">Chemical store</option>
                                                <option value="CIP">CIP</option>
                                                <option value="CO2 Plant">CO2 Plant</option>
                                                <option value="Combi line">Combi line</option>
                                                <option value="Con caustic tank">Con caustic tank</option>
                                                <option value="Conveyor">Conveyor</option>
                                                <option value="Cooling plant">Cooling plant</option>
                                                <option value="DAW Plant">DAW Plant</option>
                                                <option value="Depalletizer">Depalletizer</option>
                                                <option value="Dryer">Dryer</option>
                                                <option value="EBI">EBI</option>
                                                <option value="Filler">Filler</option>
                                                <option value="Filtration">Filtration</option>
                                                <option value="Foam Cleaning station">Foam Cleaning station</option>
                                                <option value="FST">FST</option>
                                                <option value="FST 08">FST 08</option>
                                                <option value="FST 222">FST 222</option>
                                                <option value="FST 232">FST 232</option>
                                                <option value="Heuft">Heuft</option>
                                                <option value="Horap">Horap</option>
                                                <option value="Horap/Waste yeast">Horap/Waste yeast</option>
                                                <option value="hot brew warter tank">hot brew warter tank</option>
                                                <option value="Keg Plant">Keg Plant</option>
                                                <option value="Kuiper boiler">Kuiper boiler</option>
                                                <option value="Labeller">Labeller</option>
                                                <option value="Labkeller/B filler">Labkeller/B filler</option>
                                                <option value="Laser coder">Laser coder</option>
                                                <option value="Mash copper">Mash copper</option>
                                                <option value="Mash filter">Mash filter</option>
                                                <option value="Mash Tun">Mash Tun</option>
                                                <option value="MCP-02">MCP-02</option>
                                                <option value="Packer">Packer</option>
                                                <option value="Pasteurizer">Pasteurizer</option>
                                                <option value="PKG">PKG</option>
                                                <option value="Raw Milling">Raw Milling</option>
                                                <option value="RMH">RMH</option>
                                                <option value="safety exit">safety exit</option>
                                                <option value="Steam Plant">Steam Plant</option>
                                                <option value="Sugar Plant">Sugar Plant</option>
                                                <option value="Trub tank">Trub tank</option>
                                                <option value="UPS container">UPS container</option>
                                                <option value="Utility">Utility</option>
                                                <option value="Weigher">Weigher</option>
                                                <option value="well">well</option>
                                                <option value="Work Shop">Work Shop</option>
                                                <option value="wort aeration">wort aeration</option>
                                                <option value="Wort copper">Wort copper</option>
                                                <option value="Wort/Mash copper">Wort/Mash copper</option>
                                                <option value="Wrapper">Wrapper</option>
                                                <option value="Wrapper/Keg">Wrapper/Keg</option>
                                                <option value="WTP">WTP</option>
                                                <option value="WWTP">WWTP</option>
                                                <option value="YPT">YPT</option>
                                    </select>
				<div class="form-group">
                                    <label class="control-label">Issue:</label>
                                    <input type="text" value="<?php if ($RowCount > 0) echo $row["issue"]; ?>" name="issue" class="form-control1" required="" placeholder="Issue">
                                </div>  
                                <div class="form-group">
                                    <label for="exampleInputFile">Before Image:</label>
                                    <input type="file" name="before" id="exampleInputFile" <?php
                                    if ($RowCount > 0) {
                                        
                                    } else {
                                        //echo "required";
                                    }
                                    ?>>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">After Image:</label>
                                    <input type="file" name="after" id="exampleInputFile" <?php
                                    if ($RowCount > 0) {
                                        
                                    } else {
                                        //echo "required";
                                    }
                                    ?>>
                                </div>
				<div class="form-group">
                                    <label class="control-label">Action/ Countermeasure:</label>
                                    <input type="text" value="<?php if ($RowCount > 0) echo $row["communication"]; ?>" name="communication" class="form-control1" placeholder="Action/ Countermeasure">
                                </div>  
				<div class="form-group">
                                    <label class="control-label">Who:</label><br>
                                    <select name="who">
                                    <?php
                                    $stmt = $conn->query("SELECT Name FROM app_user");
                                    //$stmt = $pdo->execute();
                                    while ($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row1['Name'] . "'>" . $row1['Name'] . "</option>";
                                    }
                                    ?>
                                    </select>
                                </div>  
				<div class="form-group">
                                    <label class="control-label">Target Date:</label>
                                    <input type="text" value="<?php if ($RowCount > 0) echo $row["targetdate"]; ?>" name="targetdate" class="form-control1" required="" placeholder="YY-mm-dd">
                                </div>  
				<div class="form-group">
                                    <label class="control-label">Actual Date:</label>
                                    <input type="text" value="<?php if ($RowCount > 0) echo $row["actualdate"]; ?>" name="actualdate" class="form-control1"  placeholder="YY-mm-dd">
                                </div>  
                                <div class="form-group">
				<div class="form-group">
                                    <label class="control-label">WO Number:</label>
                                    <input type="text" value="<?php if ($RowCount > 0) echo $row["wostatus"]; ?>" name="wostatus" class="form-control1" placeholder="WO status">
                                </div>  
				<div class="form-group">
                                    <div class="radio-inline"><label><input type="radio" name="Status" value="In progress" <?php if ($RowCount > 0 AND $row["status"] == "In progress") echo "checked"; ?> checked=""> In progress</label></div>
                                    <div class="radio-inline"><label><input type="radio" name="Status" value="Done" <?php if ($RowCount > 0 AND $row["status"] == "Done") echo "checked"; ?> > Done</label></div>
                                </div>
				<div class="form-group">
                                <?php if ($RowCount > 0) { ?>
                                    <input type="text" name="RowId" hidden="" value="<?php if ($RowCount > 0) echo $row["id"]; ?>">
                                    <?php
                                }
                                ?>
				</div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="Services" class="btn-success btn">Submit</button>
                                            <button type="reset" class="btn-inverse btn">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--body wrapper start-->
                </div>
                <!--body wrapper end-->
            </div>
            <!--footer section start-->
            <?php require_once './Footer.php'; ?>
            <!--footer section end-->

            <!-- main content end-->
        </section>

    </body>
</html>
