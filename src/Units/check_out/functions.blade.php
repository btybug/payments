@php
    function allow_guest($settings)
    {
        return isset($settings['allow_guest']);
    }

    function show_content($settings)
    {

        if (!allow_guest($settings)) {
            if (Auth::check()) {
                return true;
            }
        }
        return false;
    }

    function products($settings)
    {

    }

    function include_forms($settings, $_this)
    {
        $html='';
        if(isset($settings['forms'])){
            foreach ($settings['forms'] as $form){
            if(\View::exists($_this->slug."::forms.$form"));
                $html.=View::make($_this->slug."::forms.$form",compact($settings))->render();
            }
        }
        return $html;
    }
@endphp