<?php

return [

    // This file contains the french translated validation messages - author Nikhil Kumar Mishra

    'accepted'=> 'L\' :attribute doit être accepté. ',
    'active_url' => 'L\' :attribute n\'est pas une URL valide.',
    'after' => 'L\' :attribute doit être une date après :date.',
    'after_or_equal' => 'L\' :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'L\' :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'L\' :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'L\' :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'L\' :attribute doit être un tableau.',
    'before' => 'L\' :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'L\' :attribute doit être une date antérieure ou égale à :date.',
    'entre' => [
        'numeric' => 'L\' :attribute doit être compris entre :min et :max.',
        'file' => 'L\' :attribute doit être compris entre :min et :max kilo-octets.',
        'string' => 'L\' :attribute doit être compris entre :min et :max caractères.',
        'array' => 'L\' :attribute doit avoir entre :min et :max items.',
    ],
    'boolean' => 'Le champ: attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation de :attribut ne correspond pas.',
    'date' => 'L \' :attribute n\'est pas une date valide.',
    'date_equals' => 'L \' :attribute doit être une date égale à :date.',
    'date_format' => 'L \' :attribute ne correspond pas au format :format.',
    'different' => 'L \' :attribute et :other doivent être différents.',
    'digits' => 'L \' :attribute doit être :digits digits.',
    'digits_between' => 'L \' :attribute doit être compris entre :min et :max digits.',
    'dimensions' => 'L \' :attribute a des dimensions d\'image invalides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'L \' :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'L \' :attribute doit se terminer par l\'un des éléments suivants: :values',
    'exists' => 'L\' :attribut sélectionné n\'est pas valide.',
    'file' => 'L\' :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'L\' :attribute doit être supérieur à :value.',
        'file' => 'L\' :attribute doit être supérieur à :value kilo-octets.',
        'string' => 'L\' :attribute doit être supérieur à :value les caractères.',
        'array' => 'L\' :attribute doit avoir plus de :value éléments de valeur.',
    ],
    'gte' => [
        'numeric' => 'L\' :attribute doit être supérieur ou égal à :value.',
        'file' => 'L\' :attribute doit être supérieur ou égal à :value kilo-octets.',
        'string' => 'L\' :attribute doit être supérieur ou égal à :value caractères.',
        'array' => 'L\' :attribute doit avoir :value des éléments ou plus.',
    ],
    'image' => 'L\' :attribute doit être une image.',
    'in' => 'L\' :attribute sélectionné n\'est pas valide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans: autre.',
    'integer' => 'L\' :attribute doit être un entier.',
    'ip' => 'L\' :attribute doit être une adresse IP valide.',
    'ipv4' => 'L\' :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'L\' :attribute doit être une adresse IPv6 valide.',
    'json' => 'L\' :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'L\' :attribute doit être inférieur à :value.',
        'file' => 'L\' :attribute doit être inférieur à :value kilo-octets.',
        'string' => 'L\' :attribute doit être inférieur à :value les caractères.',
        'array' => 'L\' :attribute doit avoir moins de :value éléments.',
    ],
    'lte' => [
        'numeric' => 'L\' :attribute  doit être inférieur ou égal à :value.',
        'file' => 'L\' :attribute  doit être inférieur ou égal à :value kilo-octets.',
        'string' => 'L\' :attribute  doit être inférieur ou égal à :value les caractères.',
        'array' => 'L\' :attribute  ne doit pas avoir plus de :value éléments.',
    ],
    'max' => [
        'numeric' => 'L\' :attribute ne peut pas être supérieur à :max.',
        'file' => 'L\' :attribute ne doit pas être supérieur à :max kilo-octets.',
        'string' => 'L\' :attribute ne doit pas être supérieur à: max caractères.',
        'array' => 'L\' :attribute ne peut pas avoir plus de :max items.',
    ],
    'mimes' => 'L\' :attribute doit être un fichier de type: :value.',
    'mimetypes' => 'L\' :attribute doit être un fichier de type: :value.',
    'min' => [
        'numeric' => 'L\' :attribute doit être au moins :min.',
        'file' => 'L\' :attribute doit être au moins :min kilo-octets.',
        'string' => 'L\' :attribute doit être au moins :min caractères.',
        'array' => 'L\' :attribute doit avoir au moins :min items.',
    ],
    'not_in' => 'L\' :attribute sélectionné n\'est pas valide.',
    'not_regex' => 'Le format :attribute n\'est pas valide.',
    'numeric' => 'L\' :attribute doit être un nombre.',
    'present' => 'Le champ :attribute doit être présent.',
    'regex' => 'Le format :attribute n\'est pas valide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_if' => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values ​​est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque :values des sont présentes.',
    'required_without' => 'Le champ :attribute est obligatoire lorsque :values ​​n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsqu\'aucune des :values n\'est présente.',
    'same' => 'L\' :attribute et :other doit correspondre.',
    'size' => [
        'numeric' => 'L\' :attribute doit être :size.',
        'file' => 'L\' :attribute doit être :size kilo-octets.',
        'string' => 'L\' :attribute doit être :size caractères.',
        'array' => 'L\' :attribute doit contenir :size des éléments.',
    ],
'starts_with' => 'L\' :attribute doit commencer par l\'un des éléments suivants: :values',
'string' => 'L\' :attribute doit être une chaîne.',
'timezone' => 'L\' :attribute doit être une zone valide.',
'unique' => 'L\' :attribute a déjà été pris.',
'upload' => 'L\' :attribute n\'a pas pu être téléchargé.',
'url' => 'Le format d\':attribute n\'est pas valide.',
'uuid' => 'L\' :attribute doit être un UUID valide.',

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
            'rule-name' => 'message personnalisé',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
