<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'le :attribute doit être accepté',
    'active_url'           => 'le :attribute n est pas une URL valide.',
    'after'                => 'le :attribute doit être après :date.',
    'after_or_equal'       => 'le :attribute doit être après ou égal à :date.',
    'alpha'                => 'le :attribute doit contenir que des lettres',
    'alpha_dash'           => 'le :attribute doit contenir seulement des lettres, numéros ou tirets',
    'alpha_num'            => 'le :attribute doit contenir que des lettres ou des chiffres.',
    'array'                => 'le :attribute doit être un tableau',
    'before'               => 'le :attribute doit être une date avant :date.',
    'before_or_equal'      => 'le :attribute doit être une date avant ou égale à :date.',
    'between'              => [
        'numeric' => 'le :attribute doit être entre :min et :max.',
        'file'    => 'le :attribute doit être entre :min et :max kilobytes.',
        'string'  => 'le :attribute doit être entre :min et :max characters.',
        'array'   => 'le :attribute doit être entre :min et :max items.',
    ],
    'boolean'              => 'le :attribute champs doit etre vraie ou faux',
    'confirmed'            => 'le :attribute confirmation ne matche pas',
    'date'                 => 'le :attribute n est pas une date valide.',
    'date_format'          => 'le :attribute le format ne matche pas avec :format.',
    'different'            => 'le :attribute et :other doit etre different.',
    'digits'               => 'le :attribute doit etre :digits digitale.',
    'digits_between'       => 'le :attribute doit etre entre :min et :max digits.',
    'dimensions'           => 'le :attribute n a pas une dimension d image correcte.',
    'distinct'             => 'le :attribute champs a une valeur dupliqué',
    'email'                => 'le :attribute doit etre une adresse email valide.',
    'exists'               => 'la selection :attribute n est pas valide.',
    'file'                 => 'le :attribute doit etre un dossier.',
    'filled'               => 'le :attribute champs doit etre une valeure',
    'gt'                   => [
        'numeric' => 'le :attribute doit etre plus grand que :value.',
        'file'    => 'le :attribute doit etre plus grand que :value kilobytes.',
        'string'  => 'le :attribute doit etre plus grand que :value characters.',
        'array'   => 'le :attribute doit avoir plus de :value articles.',
    ],
    'gte'                  => [
        'numeric' => 'le :attribute doit etre plus grand que ou egal :value.',
        'file'    => 'le :attribute doit etre plus grand que ou egal :value kilobytes.',
        'string'  => 'le :attribute doit etre plus grand que ou egal :value characters.',
        'array'   => 'le :attribute doit have :value items or more.',
    ],
    'image'                => 'le :attribute doit etre une image.',
    'in'                   => 'le selected :attribute n est pas valide.',
    'in_array'             => 'le :attribute champs n existe pas dans :other.',
    'integer'              => 'le :attribute doit etre un entier.',
    'ip'                   => 'le :attribute doit etre une adresse ip valide',
    'ipv4'                 => 'le :attribute doit etre une adresse IPv4 valide.',
    'ipv6'                 => 'le :attribute doit etre une adresse IPv6 valide.',
    'json'                 => 'le :attribute doit etre une string  JSON valide.',
    'lt'                   => [
        'numeric' => 'le :attribute doit  etre plus petit que :value.',
        'file'    => 'le :attribute doit  etre plus petit que :value kilobytes.',
        'string'  => 'le :attribute doit  etre plus petit que :value characters.',
        'array'   => 'le :attribute doit avoir moins d article que :value .',
    ],
    'lte'                  => [
        'numeric' => 'le :attribute doit  etre plus petit ou egal :value.',
        'file'    => 'le :attribute doit doit etre plus petit ou egal :value kilobytes.',
        'string'  => 'le :attribute doit doit etre plus petit ou egal :value characters.',
        'array'   => 'le :attribute ne doit pas avoir plus de :value article.',
    ],
    'max'                  => [
        'numeric' => 'le :attribute ne doit pas etre plus grand que :max.',
        'file'    => 'le :attribute ne doit pas etre plus grand que :max kilobytes.',
        'string'  => 'le :attribute ne doit pas etre plus grand que :max characters.',
        'array'   => 'le :attribute ne doit pas avoir plus de  :max article.',
    ],
    'mimes'                => 'le :attribute doit etre un ficher de type: :values.',
    'mimetypes'            => 'le :attribute doit etre un ficher de type: :values.',
    'min'                  => [
        'numeric' => 'le :attribute doit etre au moins :min.',
        'file'    => 'le :attribute doit etre au moins  :min kilobytes.',
        'string'  => 'le :attribute doit etre au moins  :min characters.',
        'array'   => 'le :attribute doit avoir au moins :min articles.',
    ],
    'not_in'               => 'le choisi :attribute n est pas valide.',
    'not_regex'            => 'le :attribute format n est pas valide.',
    'numeric'              => 'le :attribute doit etre un chiffre.',
    'present'              => 'le :attribute champs doit etre present',
    'regex'                => 'le :attribute format n est pas valide.',
    'required'             => 'le :attribute champs est requis.',
    'required_if'          => 'le :attribute champs est requis quand :other est :value.',
    'required_unless'      => 'le :attribute champs est requis tant que :other est dans :values.',
    'required_with'        => 'le :attribute champs est requis quand :values est present.',
    'required_with_all'    => 'le :attribute champs est requis quand :values est present.',
    'required_without'     => 'le :attribute champs est requis quand :values  n est pas present.',
    'required_without_all' => 'le :attribute champs est requis quand aucune des  :values n est presente.',
    'same'                 => 'le :attribute et :other doit match.',
    'size'                 => [
        'numeric' => 'le :attribute doit être :size.',
        'file'    => 'le :attribute doit être :size kilobytes.',
        'string'  => 'le :attribute doit être :size characters.',
        'array'   => 'le :attribute doit contenir :size article.',
    ],
    'string'               => 'le :attribute doit etre une string.',
    'timezone'             => 'le :attribute doit etre une zone valide.',
    'unique'               => 'le :attribute a deja ete pris.',
    'uploaded'             => 'le :attribute echec de chargement.',
    'url'                  => 'le :attribute format n est pas valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
