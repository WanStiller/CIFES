<div id="chatContainer" style="width: 360px; position: fixed;z-index: 100;background: white;bottom: 0;margin-left: 10px;border:5px solid white;">
    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
    
    <!--<div id="chatUsers" class="rounded"></div>-->
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" />
            <input id="email" name="email" class="rounded" />
            <input type="submit" class="blueButton" value="Conversar" style="margin-top: 10px; " />
        </form>
        
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" style="width: 100%; margin-bottom: 10px;" />
            <input type="submit" class="blueButton" value="Enviar" />
        </form>
        
    </div>
    
</div>