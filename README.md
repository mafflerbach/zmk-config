

### pinout

()![https://nicekeyboards.com/static/1788ac663060fd510f4894b286cd97b1/e8950/pinout-v2.png]

### Left overlay

```c
/*
 * Copyright (c) 2021 The ZMK Contributors
 *
 * SPDX-License-Identifier: MIT
 */

#include "redox.dtsi"

&kscan0 {
    col-gpios
        = <&pro_micro 20 GPIO_ACTIVE_HIGH>
        , <&pro_micro 19 GPIO_ACTIVE_HIGH>
        , <&pro_micro 18 GPIO_ACTIVE_HIGH>
        , <&pro_micro 15 GPIO_ACTIVE_HIGH>
        , <&pro_micro 14 GPIO_ACTIVE_HIGH>
        , <&pro_micro 16 GPIO_ACTIVE_HIGH>
        , <&pro_micro 10 GPIO_ACTIVE_HIGH>
        ;
};
```

```c
kscan0: kscan {
    compatible = "zmk,kscan-gpio-matrix";
    wakeup-source;

    diode-direction = "col2row";
    row-gpios
        = <&pro_micro 4 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
        , <&pro_micro 6 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
        , <&pro_micro 7 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
        , <&pro_micro 8 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
        , <&pro_micro 9 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
        ;

};
```
### Right overlay

```c
/* 
 * Copyright (c) 2021 The ZMK Contributors
 *
 * SPDX-License-Identifier: MIT
 */

#include "redox.dtsi"

&default_transform {
    col-offset = <7>;
};

&kscan0 {
    col-gpios
        = <&pro_micro 10 GPIO_ACTIVE_HIGH>
        , <&pro_micro 16 GPIO_ACTIVE_HIGH>
        , <&pro_micro 14 GPIO_ACTIVE_HIGH>
        , <&pro_micro 15 GPIO_ACTIVE_HIGH>
        , <&pro_micro 18 GPIO_ACTIVE_HIGH>
        , <&pro_micro 19 GPIO_ACTIVE_HIGH>
        , <&pro_micro 20 GPIO_ACTIVE_HIGH>
        ;
};

```


```c
    kscan0: kscan {
        compatible = "zmk,kscan-gpio-matrix";
        wakeup-source;

        diode-direction = "col2row";
        row-gpios
            = <&pro_micro 4 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
            , <&pro_micro 6 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
            , <&pro_micro 7 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
            , <&pro_micro 8 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
            , <&pro_micro 9 (GPIO_ACTIVE_HIGH | GPIO_PULL_DOWN)>
            ;

    };
```
