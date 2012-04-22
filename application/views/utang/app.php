<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
        </title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
        <style>
            
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
        </script>
        <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js">
        </script>
    </head>
    <body>
        <div data-role="page" id="page1">
            <div data-theme="b" data-role="header" data-position="fixed">
                <h3>
                    Utang Mengutang
                </h3>
                <a data-role="button" data-transition="fade" href="#page1">
                    Refresh
                </a>
            </div>
            <div data-role="content">
                <ul data-role="listview" data-divider-theme="b" data-inset="false">
                    <?php 
                      $sql = 'select * from utang_user';
                      $query = $this->db->query($sql);
                      foreach($query->result() as $row): 
                    ?>
                    <li data-theme="c">
                        <a href="#page2" data-transition="slide">
                            <div class='user_name'><?php echo $row->user_name; ?></div>
                            <div class='user_amount'>$50.00</div>
                            <div class='user_activity'>2012/03/03</div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div data-theme="a" data-role="footer" style='position:fixed; bottom:0px;'>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a data-role="button" data-transition="flip" href="#page3" data-icon="star" data-iconpos="top">
                            Summary
                        </a>
                    </div>
                    <div class="ui-block-b">
                        <a data-role="button" data-transition="flip" href="#page4" data-icon="gear" data-iconpos="top">
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div data-role="page" id="page2">
            <div data-theme="b" data-role="header" data-position="fixed">
                <h3>
                    Details
                </h3>
                <a data-role="button" data-transition="slideup" href="#page1" data-icon="arrow-l" data-iconpos="left">
                    Home
                </a>
            </div>
            <div data-role="content">
                <ul data-role="listview" data-divider-theme="" data-inset="false">
                    <li data-role="list-divider" role="heading">
                        Divider
                    </li>
                    <li data-theme="c">
                        <a href="#" data-transition="slide">
                            Button
                        </a>
                    </li>
                </ul>
            </div>
            <div data-theme="a" data-role="footer" style='position:fixed; bottom:0px;'>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a data-role="button" data-transition="flip" href="#page3" data-icon="star" data-iconpos="top">
                            Summary
                        </a>
                    </div>
                    <div class="ui-block-b">
                        <a data-role="button" data-transition="flip" href="#page4" data-icon="gear" data-iconpos="top">
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div data-role="page" id="page3">
            <div data-theme="a" data-role="header" data-position="fixed">
                <a data-role="button" data-rel="back" data-transition="flip" href="#page1" data-icon="back" data-iconpos="left">
                    Back
                </a>
                <h3>
                    Summary
                </h3>
                <a data-role="button" data-transition="flip" href="#page1" data-icon="home" data-iconpos="right">
                    Home
                </a>
            </div>
            <div data-role="content">
            </div>
            <div data-theme="a" data-role="footer" style='position:fixed; bottom:0px;'>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a data-role="button" data-transition="fade" href="#page3" data-icon="star" data-iconpos="top">
                            Summary
                        </a>
                    </div>
                    <div class="ui-block-b">
                        <a data-role="button" data-transition="fade" href="#page4" data-icon="gear" data-iconpos="top">
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div data-role="page" id="page5">
            <div data-theme="a" data-role="header" data-position="fixed">
                <a data-role="button" data-rel="back" data-transition="flip" href="#page1" data-icon="back" data-iconpos="left">
                    Back
                </a>
                <h3>
                    Settings
                </h3>
                <a data-role="button" data-transition="flip" href="#page1" data-icon="home" data-iconpos="right">
                    Home
                </a>
            </div>
            <div data-role="content">
            </div>
            <div data-theme="a" data-role="footer" style='position:fixed; bottom:0px;'>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a data-role="button" data-transition="fade" href="#page3" data-icon="star" data-iconpos="top">
                            Summary
                        </a>
                    </div>
                    <div class="ui-block-b">
                        <a data-role="button" data-transition="fade" href="#page4" data-icon="gear" data-iconpos="top">
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>
