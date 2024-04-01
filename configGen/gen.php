<?php


$exceptions= [
    "KC_BSLS"  => '&kp BSLH',
    "KC_BTN1"  => '&mkp MB1',
    "KC_BTN2"  => '&mkp MB2',
    "KC_CIRC"  => '&kp CARET',
    "KC_COMM"  => '&kp COMMA',
    "KC_DLR"   => '&kp DLLR',
    "KC_ENT"   => '&kp RET',
    "KC_EQL"   => '&kp EQUAL',
    "KC_EXLM"  => '&kp EXCL',
    "KC_GRV"   => '&kp GRAVE',
    "KC_LCBR"  => '&kp LBKT',
    "KC_LPRN"  => '&kp KP_LPAR',
    "KC_LSFT"  => '&kp LSHIFT',
    "KC_MFFD"  => '&kp C_NEXT',
    "KC_MNXT"  => '&kp C_NEXT',
    "KC_MPLY"  => '&kp C_PP',
    "KC_MPRV"  => '&kp C_PREV',
    "KC_MRWD"  => '&kp C_PREV',
    "KC_MSTP"  => '&kp C_STOP',
    "KC_MS_D"  => '&kp RET',
    "KC_MS_L"  => '&kp RET',
    "KC_MS_R"  => '&kp RET',
    "KC_MS_U"  => '&kp RET',
    "KC_NO"    => '&trans',
    "KC_0"    => '&kp N0',
    "KC_1"    => '&kp N1',
    "KC_2"    => '&kp N2',
    "KC_3"    => '&kp N3',
    "KC_4"    => '&kp N4',
    "KC_5"    => '&kp N5',
    "KC_6"    => '&kp N6',
    "KC_7"    => '&kp N7',
    "KC_8"    => '&kp N8',
    "KC_9"    => '&kp N9',
    "KC_PAST"  => '&kp KP_ASTERISK',
    "KC_PDOT"  => '&kp KP_DOT',
    "KC_PENT"  => '&kp KP_ENTER',
    "KC_PERC"  => '&kp PRCNT',
    "KC_PIPE"  => '&kp BSLH',
    "KC_PMNS"  => '&kp KP_MINUS',
    "KC_PPLS"  => '&kp KP_PLUS',
    "KC_PSLS"  => '&kp KP_SLASH',
    "KC_QUOT"  => '&kp SQT',
    "KC_RBRC"  => '&kp RBKT',
    "KC_RCBR"  => '&kp RBRC',
    "KC_RGHT"  => '&kp RIGHT',
    "KC_RPRN"  => '&kp RPAR',
    "KC_SCLN"  => '&kp SEMI',
    "KC_SLSH"  => '&kp SLASH',
    "KC_SPC"   => '&kp SPACE',
    "KC_TILD"  => '&kp GRAVE',
    "KC_TRNS"  => '&trans',
    "KC_UP"    => '&kp UP',
    "KC_VOLD"  => '&kp C_VOL_DN',
    "KC_VOLU"  => '&kp C_VOL_UP',
    "MO(1)"    => '&mo 1',
    "MO(2)"    => '&mo 2',
    "MO(3)"    => '&mo 3',
    "RGB_HUD"  => '&rgb_ug RGB_HUD',
    "RGB_HUI"  => '&rgb_ug RGB_HUI',
    "RGB_MOD"  => '&rgb_ug RGB_EFF',
    "RGB_M_G"  => '&rgb_ug RGB_COLOR_HSB(300, 100, 50)',
    "RGB_M_P"  => '&rgb_ug RGB_COLOR_HSB(200, 100, 50)',
    "RGB_M_R"  => '&rgb_ug RGB_COLOR_HSB(0, 100, 50)',
    "RGB_RMOD" => '&rgb_ug RGB_EFR',
    "RGB_SAD"  => '&rgb_ug RGB_SAD',
    "RGB_SAI"  => '&rgb_ug RGB_SAI',
    "RGB_SPD"  => '&rgb_ug RGB_SPD',
    "RGB_SPI"  => '&rgb_ug RGB_SPI',
    "RGB_TOG"  => '&rgb_ug RGB_TOG',
    "RGB_VAD"  => '&rgb_ug RGB_BRD',
    "RGB_VAI"  => '&rgb_ug RGB_BRI'
];



if (file_exists("./keyboard.json")) {

    $content =json_decode( file_get_contents("./keyboard.json"), true);


    $layers = array_values($content['layers']);

print("/*\n");
print(" * Copyright (c) 2021 The ZMK Contributors\n");
print(" *\n");
print(" * SPDX-License-Identifier: MIT\n");
print(" */\n");
print("\n");
print("#include <behaviors.dtsi>\n");
print("#include <dt-bindings/zmk/keys.h>\n");
print("#include <dt-bindings/zmk/bt.h>\n");
print("#include <dt-bindings/zmk/ext_power.h>\n");
print("#include <dt-bindings/zmk/outputs.h>\n");
print("#include <dt-bindings/zmk/rgb.h>\n");

print("\n");
print("\n");
print("&led_strip { \n");
print("\tchain-length = <10>; \n");
print("};\n");

print("\n");
print("\n");


print("/  {\n");
print("    keymap {\n");
 print('           compatible =  "zmk,keymap" ;'. "\n");
    for ($i = 0; $i < count($layers); $i++) {
        if (!empty($layers[$i])) {
print("layer_$i {\n");
print(" bindings = <\n");

            print("\n");

            print(" // -----------------------------------------------------------------------------------------------------------------------------");
            for ($k = 0; $k < count($layers[$i]); $k++) {
                if ( $k == 0 ){
            print("\n");
                    print(" // | ");
                } 
                if (isset($exceptions[$layers[$i][$k]])){
                    print($exceptions[$layers[$i][$k]]."|");
                } else {
                    print("&kp " . str_replace("KC_", "",$layers[$i][$k] ) ." |");
                }
                if($k == 11 ||$k == 25 || $k == 39 || $k == 55){
                    print("\n // | ");
                }
            }
            print("\n");
            print(" // -----------------------------------------------------------------------------------------------------------------------------");
            print("\n");
            print("\n");


            for ($k = 0; $k < count($layers[$i]); $k++) {
                if (isset($exceptions[$layers[$i][$k]])){
                    print($exceptions[$layers[$i][$k]]." ");
                } else {
                    print("&kp " . str_replace("KC_", "",$layers[$i][$k] ) ." ");
                }
                if($k == 11 ||$k == 25 || $k == 39 || $k == 55){
                    print("\n");
                }
            }

print("\n>;\n ");
print("};\n ");
        }

print("\n");
print("\n");
print("\n");
    }
print("    };\n};\n");
}
