# theatersDB - Resoures

## API Endpoints & Views

| Method    | URI                                                        | View                                 |
| --------- | ---------------------------------------------------------- | ------------------------------------ |
| GET\|HEAD | /                                                          | home                                 |
| GET\|HEAD | Parastasi/{id}                                             | Parastasi.show                       |
| POST      | Parastasi/{parastasi_id}/Eisitirio/store                   | Eisitirio.checkin                    |
| GET\|HEAD | Sintelestis/{id}                                           | Sintelestis.show                     |
| GET\|HEAD | Theatis/{id}                                               | Theatis.show                         |
| POST      | Theatis/{id}/update                                        | Theatis.update                       |
| GET\|HEAD | TheatrikiParagwgi/create                                   | TheatrikiParagwgi.create             |
| GET\|HEAD | TheatrikiParagwgi/own                                      | TheatrikiParagwgi.index_own          |
| GET\|HEAD | TheatrikiParagwgi/{id}                                     | TheatrikiParagwgi.show               |
| POST      | TheatrikiParagwgi/{id}/Axiologisi/new                      | Axiologisi.store                     |
| GET\|HEAD | TheatrikiParagwgi/{id}/Axiologisi/new                      | Axiologisi.create                    |
| POST      | TheatrikiParagwgi/{id}/Sintelestes/new                     | TheatrikiParagwgi.addSintelestis     |
| GET\|HEAD | TheatrikiParagwgi/{id}/Sintelestes/new                     | TheatrikiParagwgi.addSintelestisForm |
| POST      | TheatrikiParagwgi/{id}/Sintelestes/{sintelestis_id}/remove | TheatrikiParagwgi.removeSintelestis  |
| GET\|HEAD | TheatrikiParagwgi/{paragwgi_id}/Parastasi/create           | Parastasi.create                     |
| GET\|HEAD | Theatro/{id}                                               | Theatro.show                         |
| GET\|HEAD | api/EtairiaParagwgis/{id}                                  |                                      |
| POST      | api/TheatrikiParagwgi/store                                |                                      |
| POST      | api/TheatrikiParagwgi/{paragwgi_id}/Parastasi/store        |                                      |
| GET\|HEAD | api/user                                                   |                                      |
| GET\|HEAD | login                                                      | login                                |
| POST      | login                                                      |                                      |
| POST      | logout                                                     | logout                               |
| POST      | password/confirm                                           |                                      |
| GET\|HEAD | password/confirm                                           | password.confirm                     |
| POST      | password/email                                             | password.email                       |
| POST      | password/reset                                             | password.update                      |
| GET\|HEAD | password/reset                                             | password.request                     |
| GET\|HEAD | password/reset/{token}                                     | password.reset                       |
| GET\|HEAD | register                                                   | register                             |
| POST      | register                                                   |                                      |

## Notes

**Τα _Εισιτήρια_ για κάθε _Παράσταση_ δημιουργούνται αυτόματα κατα τη δημιουργία της _Παράστασης_.**

Δημιουργούνται τόσα _Εισιτήρια_ όσα η χωρητικότητα της _Αίθουσας_.
Το 30% (`REDUCED_COUNT_RATIO = 0.3`) αυτών δεσμεύονται ως Μειωμένα με τιμή 50% της τιμής του Κανονικού _Εισιτηρίου_ (`REDUCED_PRICE_RATIO = 0.5`).
Γίνεται η υπόθεση ότι σε κάθε Σειρά της _Αίθουσας_ υπάρχουν 10 Θέσεις (`SEATS_PER_ROW = 10`).
