  
<head>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQGAmq33l9Vu9B8UQq2SFUOhPHROqbYFM"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <title>Opacko</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    
</head> 

<body style="
    padding-top: 90;
    padding-bottom: 100;
">    
    <nav style="background-color: #696969" class="navbar navbar-expand-lg navbar-dark fixed-top">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <a class="navbar-brand"
                     style="
                        color: white;
                        font-family: Courier New, Courier, monospace;
                        font-size: 25;
                        padding-right: 30;" 
                        href="<?php echo base_url("/");?>"> home
                     </a>
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a class="navbar-item"
                                style="
                                    color: white;
                                    font-family: Courier New, Courier, monospace;
                                    font-size: 25;
                                    padding-right: 30;" 
                                    href="<?php echo base_url("add");?>"> add
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="
                                    color: white;
                                    font-family: Courier New, Courier, monospace;
                                    font-size: 25;
                                    padding-right: 30;" 
                                    href="<?php echo base_url("auth/logout");?>"  >logout
                            </a>		
                        </li>                
                    </ul>
        </div>
    </nav> 