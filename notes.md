co tam bude

-   fotky, zážitky, nápady, dojmy, pocity, místa?, cíle?, důležité dny (narozky, svátky, výročí apod.) - kalendář? (spíš ne)
-   společný prostor / jednotlivé části (všechno společné (kromě Můj prostor) a označené barvičkou, koho co je)
-   soukromý prostor

co přidávat

-   fotky, poznámky, domněnky, výzvy, komentáře, představy, vzpomnínky, momentální pocity

co tam bude za fce

-   mapa? CZ/EU/svět
-   nějaké body, hodnocení, smajlíky, procenta?
-   dosažení nějakého skóre - v čem?

Vyřešit právní náležitosti aplikace

-   GDPR
-   jako vývojář mám přístup k údajům a fotkám - jak pořešit?
-   pokud budou lidi nahrávat citlivé údaje nebo fotky, které by mohly být napadnutelné, jak se chránit? (Někde napsat něco ve stylu, že vše nahrávají na vlastní nebezpečí?)
-   atd.

Do budoucna z Krasojízdy udělat i veřejnou část pro single lidi ?

-   například použít mapu, kde si člověk vybere destinaci, kam by chtěl jet a najde mu to lidi, kteří by tam chtěli jet taky
    -   filtr lidí podle parametrů (př. věk, pohlaví)
    -   možnost kontaktovat vybranou osobu
    -   udělat jakousi společnou (jednorázovou ?) spoluKrasojízdu - ta by třeba později mohla přerůst v párovou Krasojízdu

*   FLOW appky

    -   registrace

        -   formulář
        -   po registraci
            -   přihlášení
            -   úvodní slovo appky
                -   uvítání a popis toho, co je vlastně Krasojízda, jak se k ní chovat a co vyjadřuje ve spojení se svou druhou drahou polovičkou
                -   na Homepage?, jako popup? (spíš ne), samostatná stránka s tlačítkem Pokračovat na Krasojízdu? (spíš ano)

    -   přihlášení

        -   formulář
            -   po přihlášení
                -   homepage

    -   kontrola vytvořené Krasojízdy přihlášeného uživatele

        -   kontrola na základě krasojizda_id
        -   SQL tabulka "users" - zkontrolovat u přihlášeného uživatele (id) sloupec krasojizda_id
            -   pokud NULL
                -   obsah vytvoření Krasojízdy
            -   pokud id
                -   obsah po vytvoření Krasojízdy

    -   obsah vytvoření Krasojízdy
        -   SQL tabulka "invitations"
            -   result defaultně NULL nabývající pouze enum hodnot accepted, rejected, withdrawn
        -   inviter odešle form s id receivera získaného po vyhledání
            -   odebrat form s možností vyhledat partnera
            -   zobrazit odeslanou invitation s možností withdraw (stažení pozvánky)
                -   po stažení odebrat odeslanou invitation, označit ji jako withdrawn a zobrazit form s možností vyhledat partnera
            -   napsat něco ve smyslu "Čeká se na odpověď příjemce pozvánky."
        -   vždy kontrola uživatele bez Krasojízdy, jestli má záznam jako receiver s resultem NULL
            -   pokud nemá, zobrazit form s možností vyhledat partnera
            -   pokud má, zobrazí se mu místo vyhledávacího formu inviter a možnosti Accept nebo Reject
                -   po odeslání odpovědi s výsledkem se:
                    -   při Acceptu:
                        -   upraví na základě id záznamu v invitations result na accept a inviter a receiver (updatenou se k záznamu jejich id)
                        -   vytvoří se nový záznam v krasojizdas s default názvem "Krasojízda" {firstname invitera} "&" {firstname receivera}
                            -   název Krasojízdy bude možné upravovat na homepage
                            -   upraví se jejich krasojizda_id na základě nově vzniklého id v krasojizdas (lastId)
                                -   https://stackoverflow.com/questions/21084833/get-the-last-inserted-id-using-laravel-eloquent
                        -   pošle zpráva inviterovi o přijetí do Krasojízdy a o nově vzniklé Krasojízdě (nebo se zobrazí hláška na základě accepted invitation)
                        -   pošle zpráva receiverovi o nově vzniklé Krasojízdě - pouze jako flash message
                    -   při Rejectu:
                        -   upraví na základě id záznamu v invitations result na reject
                        -   pošle zpráva inviterovi o odmítnutí (nebo se zobrazí hláška na základě rejected invitation)
                        -   pošle zpráva receiverovi o odmítnutí - pouze jako flash message
                        -   zobrazit form s možností vyhledat partnera


    - obsah po vytvoření Krasojízdy
        - MENU
            - zobrazí se jen při vytvořené Krasojízdě přihlášeného uživatele
            - položky menu
                - Homepage
                    - Krasojízda Jíři a Máši
                        - editovatelný název společné Krasojízdy (př. Jířa a Máša) - defaultně se spojí firstname obou userů (př. Jiří a Marie)
                        - přidat field name do tabulky Krasojizdas
                    - profily partnerů
                        - každý user v Krasojízdě
                            - vlevo
                            - barva
                            - image
                                - default red_user_img
                                - fotka
                                - případně animace - př. mávající a smějící se Mášenka - viz. kouzelnické noviny z HP)
                            - jméno
                            - nickname
                        - položky profilu editovatelné v Profilu uživatele
                        - email nikde nezobrazovat (kvůli případným robotům, kteří by posílaly spamy)

                - Naše místa
                    - mapa EU a CZ (příklad https://www.cestujlevne.com/akcni-letenky/karibske-plaze-barbadosu-z-prahy-extra-levne)
                    - spíš svg mapy - těch výletů není zase tolik
                - Životní události
                    - flow podobná jako u Důležitých dnů
                        - zobrazují se všechny
                    - př. začátek vztahu Jíři a Máši
                    - př. promoce Jíři / Máši
                    - př. zásnuby / svatba
                    - možnost označit událost jako významnou? - tzn. field important (1, NULL)
                        - použít pro životní události a významné životní události
                - Důležité dny
                    - zobrazují se pouze na aktuální rok?
                        - top-center: velký nápis - př. 2019
                        - top-center: menší nápis vyjadřující aktuální den - př. 11. květen
                        - seřazená data od nejbližších
                            - př. so 24. srpen - Martin Sodomka svatba - za 21 dní (neopakující se)
                            - př. čt 17. říjen - Mášenka narozeniny - za 75 dní (opakující se každoročně)
                                - dnes, zítra, pozítří, za 3-4 dny, za 5-n dní
                - Média (pracovní název) / Zážitky
                    - divadla, koncerty, filmy nebo seriály, případně knihy, které bychom chtěli zkouknout nebe přečíst
                - Rozhovory
                    - podobné Taskům
                    - vytvoření titulku a obsahu na nějaké téma, které je potřeba ve dvojici probrat
                    - každý user může dané téma (příspěvek) označit jako probrané a rovněž jej i editovat a smazat
                - Blog
                    - oba by tam mohli něco delšího psát (použít na to psací font?)
                - Můj koutek
                    - přístup jen pro přihlášeného uživatele
                        - nápady, dojmy, pocity, poznámky

-   v rámci usera upravovat barvu daného usera (řešení toho problému, že růžová by mohla připadnout klukovi a modrá holce)
    -   ptát se při registraci na pohlaví?
-   prozatím jen možnost volby mezi růžovou a modrou (případně další viz. barvy MacBooku nebo odstíny růžové a modré?)
-   na základě barvy se bude určovat, od koho je daný příspěvek, tzn. barva se bude ukládat v databázi - nový field color, kde bude uchován hexa kód barvy

*   bude potřeba dodělat v objektu Usera metodu, která zkontroluje, jestli je přihlášený user admin (\$user->isAdmin())
*   na základě tohoto udělat a registrovat nový middleware (podobně jako CheckKrasojizda), který zkontroluje, jestli je přihlášený user admin (\$user->isAdmin())
*   při iniciaci php artisan migrate:fresh je potřeba vyrobit seed (či factory?), který vždy vytvoří defaultní data
    -   je potřeba vytvořit alespoň 2 colors, tzn. cyan a magentu
    -   je potřeba vytvořit usera admin (definovat roles nebo ho natvrdo určit jakožto id=1 - spíše definovat roles)
