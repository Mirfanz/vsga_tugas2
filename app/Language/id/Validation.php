<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets'      => 'No rulesets specified in Validation configuration.',
    'ruleNotFound'    => '{0} is not a valid rule.',
    'groupNotFound'   => '{0} is not a validation rules group.',
    'groupNotArray'   => '{0} rule group must be an array.',
    'invalidTemplate' => '{0} is not a valid Validation template.',

    // Rule Messages
    'alpha'                 => '{field} hanya boleh berisi huruf alfabet.',
    'alpha_dash'            => '{field} hanya boleh berisi huruf, angka, garis bawah, dan -.',
    'alpha_numeric'         => '{field} hanya boleh berisi huruf atau angka.',
    'alpha_numeric_punct'   => '{field} hanya boleh berisi huruf, angka, spasi, dan  ~ . ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => '{field} hanya boleh berisi huruf, angka dan spasi.',
    'alpha_space'           => '{field} hanya boleh berisi huruf alfabet dan spasi.',
    'decimal'               => '{field} harus berisi bilangan desimal.',
    'differs'               => '{field} tidak boleh sama dengan {param}.',
    'equals'                => '{field} harus sama dengan {param}.',
    'exact_length'          => '{field} harus berisi {param} karakter.',
    'greater_than'          => '{field} harus lebih besar dari {param}.',
    'greater_than_equal_to' => '{field} harus lebih besar atau sama dengan {param}.',
    'hex'                   => '{field} hanya boleh berisi karakter hexadesimal.',
    'in_list'               => '{field} harus ada di {param}.',
    'integer'               => '{field} harus berisi angka.',
    'is_natural'            => '{field} hanya boleh berisi angka saja.',
    'is_natural_no_zero'    => '{field} hanya boleh berisi angka lebih dari 0.',
    'is_not_unique'         => '{field} harus sudah ada di database.',
    'is_unique'             => '{field} harus unik.',
    'less_than'             => '{field} harus < {param}.',
    'less_than_equal_to'    => '{field} harus kurang dari atau sama dengan {param}.',
    'matches'               => '{field} dan {param} tidak cocok.',
    'max_length'            => '{field} field cannot exceed {param} characters in length.',
    'min_length'            => '{field} harus be at least {param} characters in length.',
    'not_equals'            => '{field} field cannot be: {param}.',
    'not_in_list'           => '{field} harus not be one of: {param}.',
    'numeric'               => '{field} harus berisi only numbers.',
    'regex_match'           => '{field} field is not in the correct format.',
    'required'              => '{field} harus diisi.',
    'required_with'         => '{field} field is required when {param} is present.',
    'required_without'      => '{field} field is required when {param} is not present.',
    'string'                => '{field} harus be a valid string.',
    'timezone'              => '{field} harus be a valid timezone.',
    'valid_base64'          => '{field} harus be a valid base64 string.',
    'valid_email'           => '{field} harus berisi alamat email yang benar.',
    'valid_emails'          => '{field} harus berisi all valid email addresses.',
    'valid_ip'              => '{field} harus berisi a valid IP.',
    'valid_url'             => '{field} harus berisi url yang benar.',
    'valid_date'            => '{field} harus berisi tanggal yang benar.',

    // Credit Cards
    'valid_cc_num' => '{field} does not appear to be a valid credit card number.',

    // Files
    'uploaded' => '{field} harus diisi.',
    'max_size' => 'ukuran file terlalu besar.',
    'is_image' => 'yang anda masukkan bukan gambar.',
    'mime_in'  => 'tipe file tidak cocok.',
    'ext_in'   => 'ekstensi file tidak cocok.',
    'max_dims' => 'dimensi gambar terlalu besar.',
];
