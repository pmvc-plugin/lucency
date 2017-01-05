<?php
namespace PMVC\PlugIn\lucency;

use PMVC\Event;

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\lucency';

class lucency extends \PMVC\PlugIn
{
    public function init()
    {
        \PMVC\callPlugin(
            'dispatcher',
            'attach',
            [ 
                $this,
                Event\B4_PROCESS_VIEW,
            ]
        );
    }

    public function onB4ProcessView($subject)
    {
        $subject->detach($this);
        $penv = \PMVC\plug('getenv');
        $pvid = $penv->get('UNIQUE_ID');
        \PMVC\plug('view')->set(
            'pvid',
            $pvid
        );
    }
}
