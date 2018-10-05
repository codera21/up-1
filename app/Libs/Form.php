<?php

namespace App\Libs;

class Form
{

    /**
     * Generate attributes
     *
     * @param type $attr
     * @return string
     */
    private static function attributes($attr = array())
    {
        $html = '';
        foreach ($attr as $key => $val) {
            $html.=' ' . $key . '="' . $val . '"';
        }
        return $html;
    }

    /**
     * Generate label
     *
     * @param string $for
     * @param string $label
     * @param array $attr
     * @return string
     */
    public static function label($for, $label = '', $attr = array())
    {
        return $html = '<label for="' . $for . '"  ' . self::attributes($attr) . '>' . $label . '</label>';
    }

    /**
     * Generate text input
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function text($name, $value = '', $attr = array())
    {
        return $html = '<input type="text" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' />';
    }

    /**
     * Generate password input
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function password($name, $value = '', $attr = array())
    {
        return $html = '<input type="password" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' />';
    }

    /**
     * Generate hidden input
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function hidden($name, $value = '', $attr = array())
    {
        return $html = '<input type="hidden" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' />';
    }

    /**
     * Generate readonly input
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function readonly($name, $value = '', $attr = array())
    {
        return $html = '<input type="text" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' readonly />';
    }

    /**
     * Generate file input
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function file($name, $value = '', $attr = array())
    {
        return $html = '<input type="file" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' />';
    }

    /**
     * Generate submit button
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function submit($name, $value = '', $attr = array())
    {
        $html = '<button type="submit" name="' . $name . '" ' . self::attributes($attr) . '>' . $value . '</button>';
    }

    /**
     * Generate simple button
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function button($name, $value = '', $attr = array())
    {
        $html = '<button type="button" name="' . $name . '" ' . self::attributes($attr) . '>' . $value . '</button>';
    }

    /**
     * Generate reset button
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function reset($name, $value = '', $attr = array())
    {
        $html = '<button type="reset" name="' . $name . '" ' . self::attributes($attr) . '>' . $value . '</button>';
    }

    /**
     * Generate textarea
     *
     * @param string $name
     * @param string $value
     * @param array $attr
     * @return string
     */
    public static function textarea($name, $value = '', $attr = array())
    {
        return $html = '<textare name="' . $name . '" ' . self::attributes($attr) . '>' . $value . '</textarea>';
    }

    /**
     * Generate select dropdown
     *
     * @param string $name
     * @param string $options
     * @param string $selected
     * @param string $attr
     * @return string
     */
    public static function select($name, $options = array(), $selected = null, $attr = array())
    {
        $html = '';
        $html.='<select name="' . $name . '" ' . self::attributes($attr) . '>';

        if (count($options) > 0) {
            foreach ($options as $value => $text) {
                if (is_array($text)) {
                    $html.='<optgroup label="' . $value . '">';
                    foreach ($text as $val => $txt) {
                        if ($val == $selected and $val != "") {
                            $html.='<option value="' . $val . '" selected>' . $txt . '</option>';
                        } else {
                            $html.='<option value="' . $val . '">' . $txt . '</option>';
                        }
                    }
                    $html.='</optgroup>';
                } else {
                    if ($value == $selected and $value != "") {
                        $html.='<option value="' . $value . '" selected>' . $text . '</option>';
                    } else {
                        $html.='<option value="' . $value . '">' . $text . '</option>';
                    }
                }
            }
        }

        $html.='</select>';

        return $html;
    }

    /**
     * Generate radio
     *
     * @param string $name
     * @param string $value
     * @param string $checked
     * @param array $attr
     * @return string
     */
    public static function radio($name, $value = '', $checked = false, $attr = array())
    {
        return $html = '<label for="' . $name . '" class="i-checks">
                    <input type="radio" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' ' . ($checked == true ? 'checked' : ' ') . '/>
                </label>';
    }

    /**
     * Generate radios
     *
     * @param string $name
     * @param array $options
     * @param string $checked
     * @param array $attr
     * @param bool $inline
     * @return string
     */
    public static function radios($name, $options = array(), $checked = null, $attr = array(), $inline = true)
    {
        $html = '';

        $no = 1;
        if (count($options) > 0) {
            foreach ($options as $value => $text) {
                $id = $name . "_" . $no;
                if ($value == $checked and $value != "") {
                    $html.='<label for="' . $id . '" class="i-checks"><input type="radio" name="' . $name . '" value="' . $value . '" id="' . $id . '" ' . self::attributes($attr) . ' checked> ' . $text . '</label>';
                } else {
                    $html.='<label for="' . $id . '" class="i-checks"><input type="radio" name="' . $name . '" value="' . $value . '" id="' . $id . '" ' . self::attributes($attr) . '> ' . $text . '</label>';
                }
                $html.=($inline == false ? '<div class="clearfix"></div>' : '&nbsp;&nbsp;&nbsp;');
                $no++;
            }
        }

        return $html;
    }

    /**
     * Generate checkbox
     *
     * @param string $name
     * @param string $value
     * @param string $checked
     * @param array $attr
     * @return string
     */
    public static function checkbox($name, $value = '', $checked = false, $attr = array())
    {

        return $html = '<label for="' . $name . '" class="i-checks">
                    <input type="checkbox" name="' . $name . '" value="' . $value . '" ' . self::attributes($attr) . ' ' . ($checked == true ? 'checked' : ' ') . '/>
                </label>';
    }

    /**
     * Generate checkboxes
     *
     * @param string $name
     * @param array $options
     * @param mixed $checked
     * @param array $attr
     * @param bool $inline
     * @return string
     */
    public static function checkboxes($name, $options = array(), $checked = null, $attr = array(), $inline = true)
    {

        $html = '';

        $no = 1;
        if (count($options) > 0) {
            foreach ($options as $value => $text) {
                $id = $name . "_" . $no;
                if ((is_string($checked) and $value == $checked) or ( is_array($checked) and array_key_exists($value, $checked)) and $value != "") {
                    $html.='<label for="' . $id . '" class="i-checks"><input type="checkbox" name="' . $name . '[' . $value . ']" value="' . $value . '" id="' . $id . '" ' . self::attributes($attr) . ' checked> ' . $text . '</label>';
                } else {
                    $html.='<label for="' . $id . '" class="i-checks"><input type="checkbox" name="' . $name . '[' . $value . ']" value="' . $value . '" id="' . $id . '" ' . self::attributes($attr) . '> ' . $text . '</label>';
                }
                $html.=($inline == false ? '<div class="clearfix"></div>' : '&nbsp;&nbsp;&nbsp;');
                $no++;
            }
        }

        return $html;
    }

}
