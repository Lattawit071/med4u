<?php
class components
{
    public String $placeholder;
    function input_button_text_search($placeholder)
    {
        return '
        <div class="container d-flex justify-content-center align-items-center mb-5">
            <div class="search-box align-items-center col-5 b-5">
                <input type="text" class="input-search" placeholder="' . $placeholder . '" aria-describedby="button-addon2"> 
                <span class="fas fa-search iconspan"></span>
                     
            </div>
        </div>';
    }
}
