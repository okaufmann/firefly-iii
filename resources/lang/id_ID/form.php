<?php

/**
 * form.php
 * Copyright (c) 2019 james@firefly-iii.org
 *
 * This file is part of Firefly III (https://github.com/firefly-iii).
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

return [
    // new user:
    'bank_name'                   => 'Nama Bank',
    'bank_balance'                => 'Keseimbangan',
    'savings_balance'             => 'Saldo tabungan',
    'credit_card_limit'           => 'Batas kartu kredit',
    'automatch'                   => 'Cocokkan secara otomatis',
    'skip'                        => 'Melewatkan',
    'enabled'                     => 'Enabled',
    'name'                        => 'Nama',
    'active'                      => 'Aktif',
    'amount_min'                  => 'Jumlah minimal',
    'amount_max'                  => 'Jumlah maksimum',
    'match'                       => 'Cocok di',
    'strict'                      => 'Strict mode',
    'repeat_freq'                 => 'Berulang',
    'object_group'                => 'Group',
    'location'                    => 'Location',
    'update_channel'              => 'Update channel',
    'currency_id'                 => 'Mata uang',
    'transaction_currency_id'     => 'Currency',
    'auto_budget_currency_id'     => 'Currency',
    'external_ip'                 => 'Your server\'s external IP',
    'attachments'                 => 'Lampiran',
    'BIC'                         => 'BIC',
    'verify_password'             => 'Verifikasi keamanan kata sandi',
    'source_account'              => 'Akun sumber',
    'destination_account'         => 'Akun tujuan',
    'asset_destination_account'   => 'Destination account',
    'include_net_worth'           => 'Include in net worth',
    'asset_source_account'        => 'Source account',
    'journal_description'         => 'Deskripsi',
    'note'                        => 'Catatan',
    'currency'                    => 'Mata uang',
    'account_id'                  => 'Akun aset',
    'budget_id'                   => 'Anggaran',
    'opening_balance'             => 'Opening balance',
    'tagMode'                     => 'Mode Tag',
    'virtual_balance'             => 'Virtual balance',
    'targetamount'                => 'Jumlah target',
    'account_role'                => 'Account role',
    'opening_balance_date'        => 'Opening balance date',
    'cc_type'                     => 'Credit card payment plan',
    'cc_monthly_payment_date'     => 'Credit card monthly payment date',
    'piggy_bank_id'               => 'Celengan',
    'returnHere'                  => 'Kembali ke sini',
    'returnHereExplanation'       => 'Setelah menyimpan, kembali ke sini untuk membuat yang lain.',
    'returnHereUpdateExplanation' => 'Setelah update, kembali ke sini.',
    'description'                 => 'Deskripsi',
    'expense_account'             => 'Rekening pengeluaran',
    'revenue_account'             => 'Akun pendapatan',
    'decimal_places'              => 'Tempat desimal',
    'destination_amount'          => 'Jumlah (tujuan)',
    'new_email_address'           => 'Alamat email baru',
    'verification'                => 'Verifikasi',
    'api_key'                     => 'Kunci API',
    'remember_me'                 => 'Remember me',
    'liability_type_id'           => 'Liability type',
    'liability_type'              => 'Liability type',
    'interest'                    => 'Interest',
    'interest_period'             => 'Interest period',

    'type'               => 'Mengetik',
    'convert_Withdrawal' => 'Mengkonversi penarikan',
    'convert_Deposit'    => 'Convert deposit',
    'convert_Transfer'   => 'Mengkonversi transfer',

    'amount'                      => 'Jumlah',
    'foreign_amount'              => 'Foreign amount',
    'date'                        => 'Tanggal',
    'interest_date'               => 'Tanggal bunga',
    'book_date'                   => 'Tanggal buku',
    'process_date'                => 'Tanggal pemrosesan',
    'category'                    => 'Kategori',
    'tags'                        => 'Tag',
    'deletePermanently'           => 'Hapus secara permanen',
    'cancel'                      => 'Membatalkan',
    'targetdate'                  => 'Tanggal target',
    'startdate'                   => 'Mulai tanggal',
    'tag'                         => 'Menandai',
    'under'                       => 'Dibawah',
    'symbol'                      => 'Simbol',
    'code'                        => 'Kode',
    'iban'                        => 'IBAN',
    'account_number'              => 'Account number',
    'creditCardNumber'            => 'Nomor kartu kredit',
    'has_headers'                 => 'Judul',
    'date_format'                 => 'Format tanggal',
    'specifix'                    => 'Perbaikan spesifik bank atau berkas',
    'attachments[]'               => 'Lampiran',
    'title'                       => 'Judul',
    'notes'                       => 'Catatan',
    'filename'                    => 'Nama file',
    'mime'                        => 'Tipe mime',
    'size'                        => 'Ukuran',
    'trigger'                     => 'Pelatuk',
    'stop_processing'             => 'Berhenti memproses',
    'start_date'                  => 'Mulai dari jangkauan',
    'end_date'                    => 'Akhir rentang',
    'start'                       => 'Start of range',
    'end'                         => 'End of range',
    'delete_account'              => 'Delete account ":name"',
    'delete_bill'                 => 'Hapus tagihan ":name"',
    'delete_budget'               => 'Hapus anggaran ":name"',
    'delete_category'             => 'Hapus kategori ":name"',
    'delete_currency'             => 'Hapus mata uang ":name"',
    'delete_journal'              => 'Hapus transaksi dengan deskripsi ":description"',
    'delete_attachment'           => 'Hapus lampiran ":name"',
    'delete_rule'                 => 'Hapus aturan ":title"',
    'delete_rule_group'           => 'Hapus grup aturan ":title"',
    'delete_link_type'            => 'Hapus jenis tautan ":name"',
    'delete_user'                 => 'Hapus pengguna ":email"',
    'delete_recurring'            => 'Delete recurring transaction ":title"',
    'user_areYouSure'             => 'Jika Anda menghapus pengguna ":email", semuanya akan hilang. Tidak ada undo, undelete atau apapun. Jika Anda menghapus diri Anda sendiri, Anda akan kehilangan akses ke Firefly III ini.',
    'attachment_areYouSure'       => 'Yakin ingin menghapus lampiran yang bernama ":name"?',
    'account_areYouSure'          => 'Yakin ingin menghapus akun dengan nama ":name"?',
    'account_areYouSure_js'       => 'Are you sure you want to delete the account named "{name}"?',
    'bill_areYouSure'             => 'Yakin ingin menghapus tagihan yang bernama ":name"?',
    'rule_areYouSure'             => 'Yakin ingin menghapus aturan yang berjudul ":title"?',
    'object_group_areYouSure'     => 'Are you sure you want to delete the group titled ":title"?',
    'ruleGroup_areYouSure'        => 'Yakin ingin menghapus grup aturan yang berjudul ":title"?',
    'budget_areYouSure'           => 'Yakin ingin menghapus anggaran dengan nama ":name"?',
    'category_areYouSure'         => 'Yakin ingin menghapus kategori yang bernama ":name"?',
    'recurring_areYouSure'        => 'Are you sure you want to delete the recurring transaction titled ":title"?',
    'currency_areYouSure'         => 'Yakin ingin menghapus mata uang dengan nama ":name"?',
    'piggyBank_areYouSure'        => 'Yakin ingin menghapus piggy bank yang bernama ":name"?',
    'journal_areYouSure'          => 'Yakin ingin menghapus transaksi yang dijelaskan ":description"?',
    'mass_journal_are_you_sure'   => 'Yakin ingin menghapus transaksi ini?',
    'tag_areYouSure'              => 'Yakin ingin menghapus tag ":tag"?',
    'journal_link_areYouSure'     => 'Yakin ingin menghapus tautan antara <a href=":source_link">:source</a> and <a href=":destination_link">:destination</a>?',
    'linkType_areYouSure'         => 'Yakin ingin menghapus jenis tautan ":name" (":inward" / ":outward")?',
    'permDeleteWarning'           => 'Deleting stuff from Firefly III is permanent and cannot be undone.',
    'mass_make_selection'         => 'Anda masih dapat mencegah agar item dihapus dengan menghapus kotak centang.',
    'delete_all_permanently'      => 'Hapus yang dipilih secara permanen',
    'update_all_journals'         => 'Perbarui transaksi ini',
    'also_delete_transactions'    => 'Satu-satunya transaksi yang terhubung ke akun ini akan dihapus juga. | Semua :count transaksi yang terhubung ke akun ini akan dihapus juga.',
    'also_delete_transactions_js' => 'No transactions|The only transaction connected to this account will be deleted as well.|All {count} transactions connected to this account will be deleted as well.',
    'also_delete_connections'     => 'Satu-satunya transaksi yang terkait dengan jenis link ini akan kehilangan koneksi ini. Semua :count transaksi yang terkait dengan jenis link ini akan kehilangan koneksi mereka.',
    'also_delete_rules'           => 'Aturan satu-satunya yang terhubung ke grup aturan ini akan dihapus juga. Aturan All :count yang terhubung ke grup aturan ini akan dihapus juga.',
    'also_delete_piggyBanks'      => 'Satu-satunya piggy bank yang terhubung ke akun ini akan dihapus juga. Semua :count piggy bank yang terhubung ke akun ini akan dihapus juga.',
    'also_delete_piggyBanks_js'   => 'No piggy banks|The only piggy bank connected to this account will be deleted as well.|All {count} piggy banks connected to this account will be deleted as well.',
    'not_delete_piggy_banks'      => 'The piggy bank connected to this group will not be deleted.|The :count piggy banks connected to this group will not be deleted.',
    'bill_keep_transactions'      => 'The only transaction connected to this bill will not be deleted.|All :count transactions connected to this bill will be spared deletion.',
    'budget_keep_transactions'    => 'The only transaction connected to this budget will not be deleted.|All :count transactions connected to this budget will be spared deletion.',
    'category_keep_transactions'  => 'The only transaction connected to this category will not be deleted.|All :count transactions connected to this category will be spared deletion.',
    'recurring_keep_transactions' => 'The only transaction created by this recurring transaction will not be deleted.|All :count transactions created by this recurring transaction will be spared deletion.',
    'tag_keep_transactions'       => 'The only transaction connected to this tag will not be deleted.|All :count transactions connected to this tag will be spared deletion.',
    'check_for_updates'           => 'Check for updates',
    'liability_direction'         => 'Liability in/out',

    'delete_object_group' => 'Delete group ":title"',

    'email'                 => 'Alamat email',
    'password'              => 'Kata sandi',
    'password_confirmation' => 'Password (lagi)',
    'blocked'               => 'Apakah diblokir?',
    'blocked_code'          => 'Alasan untuk blok',
    'login_name'            => 'Login',
    'is_owner'              => 'Is admin?',

    // import
    'apply_rules'           => 'Apply rules',
    'artist'                => 'Artist',
    'album'                 => 'Album',
    'song'                  => 'Song',


    // admin
    'domain'                => 'Domain',
    'single_user_mode'      => 'Nonaktifkan pendaftaran pengguna',
    'is_demo_site'          => 'Apakah situs demo',

    // import
    'configuration_file'    => 'File konfigurasi',
    'csv_comma'             => 'Koma (,)',
    'csv_semicolon'         => 'Titik koma (;)',
    'csv_tab'               => 'Tab (tak terlihat)',
    'csv_delimiter'         => 'Pembatas lapangan CSV',
    'client_id'             => 'ID klien',
    'app_id'                => 'App ID',
    'secret'                => 'Secret',
    'public_key'            => 'Kunci publik',
    'country_code'          => 'Kode negara',
    'provider_code'         => 'Bank atau penyedia data',
    'fints_url'             => 'FinTS API URL',
    'fints_port'            => 'Port',
    'fints_bank_code'       => 'Bank code',
    'fints_username'        => 'Username',
    'fints_password'        => 'PIN / Password',
    'fints_account'         => 'FinTS account',
    'local_account'         => 'Firefly III account',
    'from_date'             => 'Date from',
    'to_date'               => 'Date to',


    'due_date'                => 'Batas tanggal terakhir',
    'payment_date'            => 'Tanggal pembayaran',
    'invoice_date'            => 'Tanggal faktur',
    'internal_reference'      => 'Referensi internal',
    'inward'                  => 'Deskripsi dalam',
    'outward'                 => 'Deskripsi luar',
    'rule_group_id'           => 'Kelompok aturan',
    'transaction_description' => 'Transaction description',
    'first_date'              => 'First date',
    'transaction_type'        => 'Transaction type',
    'repeat_until'            => 'Repeat until',
    'recurring_description'   => 'Recurring transaction description',
    'repetition_type'         => 'Type of repetition',
    'foreign_currency_id'     => 'Foreign currency',
    'repetition_end'          => 'Repetition ends',
    'repetitions'             => 'Repetitions',
    'calendar'                => 'Calendar',
    'weekend'                 => 'Weekend',
    'client_secret'           => 'Client secret',

    'withdrawal_destination_id' => 'Destination account',
    'deposit_source_id'         => 'Source account',
    'expected_on'               => 'Expected on',
    'paid'                      => 'Paid',

    'auto_budget_type'   => 'Auto-budget',
    'auto_budget_amount' => 'Auto-budget amount',
    'auto_budget_period' => 'Auto-budget period',

    'collected' => 'Collected',
    'submitted' => 'Submitted',
    'key'       => 'Key',
    'value'     => 'Content of record',


];
