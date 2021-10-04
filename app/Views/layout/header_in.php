  
<head>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Opacko</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
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