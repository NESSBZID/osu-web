<?php

/**
 *    Copyright 2015-2018 ppy Pty. Ltd.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

return [
    'admin' => [
        'warehouse' => 'Lagerhaus',
    ],

    'cart' => [
        'checkout' => 'Kasse',
        'more_goodies' => 'Ich möchte noch nach anderen Artikeln suchen, bevor ich meine Bestellung aufgebe',
        'shipping_fees' => 'Versandkosten',
        'title' => 'Warenkorb',
        'total' => 'gesamt',

        'errors_no_checkout' => [
            'line_1' => '',
            'line_2' => 'Entfernen oder aktualisieren Sie Ihre Artikel bevor Sie fortfahren.',
        ],

        'empty' => [
            'text' => 'Ihr Warenkorb ist leer',
            'return_link' => [
                '_' => '',
                'link_text' => '',
            ],
        ],
    ],

    'checkout' => [
        'cart_problems' => 'Es gibt Probleme in deinem Warenkorb!',
        'cart_problems_edit' => 'Klick hier, um ihn zu bearbeiten.',
        'declined' => 'Der Bezahlvorgang wurde abgebrochen.',
        'old_cart' => 'Dein Warenkorb war nicht aktuell und wurde erneut geladen, bitte versuche es erneut.',
        'pay' => 'Mit Paypal bezahlen',
        'pending_checkout' => [
            'line_1' => 'Der vorherige Bezahlvorgang wurde gestartet, aber nicht beendet.',
            'line_2' => 'Wähle eine Bezahlmethode zum Fortfahren oder :link zum Abbrechen.',
            'link_text' => 'klick hier',
        ],
        'delayed_shipping' => 'Wir sind momentan etwas mit Bestellungen überfordert! Wir nehmen weiterhin Bestellungen an, allerdings muss mit **zusätzlichen 1-2 Wochen Verzögerung** gerechnet werden, während die aktuellen Bestellungen aufgearbeitet werden.',
    ],

    'discount' => 'spare :percent%',

    'mail' => [
        'payment_completed' => [
            'subject' => 'Wir haben deine osu!store Bestellung erhalten!',
        ],
    ],

    'order' => [
        'item' => [
            'display_name' => [
                'supporter_tag' => ':name für :username (:duration)',
            ],
            'quantity' => 'Menge',
        ],

        'not_modifiable_exception' => [
            'cancelled' => 'Sie können ihre bestellung nicht bearbeiten da diese abgebrochen wurde',
            'checkout' => 'Sie können Ihre Bestellung nicht verändern während diese bearbeitet wird.', // checkout and processing should have the same message.
            'default' => 'Bestellung kann nicht bearbeitet werden',
            'delivered' => 'Sie können Ihre Bestellung nicht verändern, da diese bereits zugestellt wird.',
            'paid' => 'Sie können ihre Bestellung nicht bearbeiten, da diese bereits bezahlt wurde.',
            'processing' => 'Sie können Ihre Bestellung nicht verändern, während diese bearbeitet wird.',
            'shipped' => 'Sie können ihre Bestellung nicht bearbeiten da diese bereits verschickt wurde',
        ],
    ],

    'product' => [
        'name' => 'Name',

        'stock' => [
            'out' => 'Leider ist dieser Artikel momentan ausverkauft. Schau doch später noch mal vorbei!',
            'out_with_alternative' => 'Leider ist dieser Artikel momentan ausverkauft. Du kannst dir in der Dropdown-Liste eine Alternative aussuchen oder später noch mal vorbeischauen!',
        ],

        'add_to_cart' => 'Zum Warenkorb hinzufügen',
        'notify' => 'Benachrichtige mich, sobald der Artikel wieder verfügbar ist!',

        'notification_success' => 'du erhältst eine benachrichtigung, sobald neuer bestand vorhanden ist. klick :link zum abbrechen',
        'notification_remove_text' => 'hier',

        'notification_in_stock' => 'Dieser Artikel ist bereits verfügbar!',
    ],

    'supporter_tag' => [
        'gift' => 'an jemanden verschenken',
        'require_login' => [
            '_' => 'Um einen Supporter-Tag zu erhalten, musst du :link sein!',
            'link_text' => 'eingeloggt',
        ],
    ],

    'username_change' => [
        'check' => 'Gib einen Nutzernamen ein, um die Verfügbarkeit zu prüfen!',
        'checking' => 'Prüfe Verfügbarkeit von :username...',
        'require_login' => [
            '_' => 'Um deinen Namen zu ändern, musst du :link sein!',
            'link_text' => 'eingeloggt',
        ],
    ],
];
