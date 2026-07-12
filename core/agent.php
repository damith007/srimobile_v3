<?php

 function ua($agent) {

  if ( preg_match( '|Nokia ([^\s]+)|i', $agent, $match ) ) {
   return $match[0] ;
  } else
   if ( preg_match( '|Nokia([^\(\-\_\/\;\)]+)|i', $agent, $match ) ) {
    return $match[0] ;
   } else
    if ( preg_match( "|iPhone OS ([^\_\/]+)|i", $agent, $match ) ) {
     return $match[0] ;
    } else
     if ( preg_match( '|BlackBerry([^\;\/]+)|i', $agent, $match ) ) {
      return $match[0] ;
     } else
      if ( preg_match( '|SonyEricsson([^\s\/]+)|i', $agent, $match ) ) {
       return $match[0] ;
      } else
       if ( preg_match( '|SAMSUNG([^\s\/]+)|i', $agent, $match ) ) {
        return $match[0] ;
       } else
        if ( preg_match( '|SEC([^\s\/]+)|i', $agent, $match ) ) {
         return $match[0] ;
        } else
         if ( preg_match( '|SCH([^\s\/]+)|i', $agent, $match ) ) {
          return $match[0] ;
         } else
          if ( preg_match( '|SGH([^\s\/]+)|i', $agent, $match ) ) {
           return $match[0] ;
          } else
           if ( preg_match( '|GT-([^\s\/]+)|i', $agent, $match ) ) {
            return $match[0] ;
           } else
            if ( preg_match( '|MOT([^\s\/]+)|i', $agent, $match ) ) {
             return $match[0] ;
            } else
             if ( preg_match( '|LG/([^\s\/]+)|i', $agent, $match ) ) {
              return $match[0] ;
             } else
              if ( preg_match( '|LG([^\s\/]+)|i', $agent, $match ) ) {
               return $match[0] ;
              } else
               if ( preg_match( '|SAGEM([^\s\/]+)|i', $agent, $match ) ) {
                return $match[0] ;
               } else
                if ( preg_match( '|PHILIPS ([^\s\/]+)|i', $agent, $match ) ) {
                 return $match[0] ;
                } else
                 if ( preg_match( '|PHILIPS([^\s\/]+)|i', $agent, $match ) ) {
                  return $match[0] ;
                 } else
                  if ( preg_match( '|SHARP([^\s\/]+)|i', $agent, $match ) ) {
                   return $match[0] ;
                  } else
                   if ( preg_match( '|SIE([^\s\/]+)|i', $agent, $match ) ) {
                    return $match[0] ;
                   } else
                    if ( preg_match( '|Alcatel ([^\s\/]+)|i', $agent, $match ) ) {
                     return $match[0] ;
                    } else
                     if ( preg_match( '|Alcatel([^\s\/]+)|i', $agent, $match ) ) {
                      return $match[0] ;
                     } else
                      if ( preg_match( '|Panasonic([^\s\/]+)|i', $agent, $match ) ) {
                       return $match[0] ;
                      } else
                       if ( preg_match( '|Ericsson([^\/]+)|i', $agent, $match ) ) {
                        return $match[0] ;
                       } else
                        if ( preg_match( '|HTC ([^\s]+)|i', $agent, $match ) ) {
                         return $match[0] ;
                        } else
                         if ( preg_match( '|HTC([^\s\-\/]+)|i', $agent, $match ) ) {
                          return $match[0] ;
                         } else
                          if ( preg_match( '|CHT([^\/]+)|i', $agent, $match ) ) {
                           return $match[0] ;
                          } else
                           if ( preg_match( '|SPV ([^\s\/]+)|i', $agent, $match ) ) {
                            return $match[0] ;
                           } else
                            if ( preg_match( '|SPV([^\s\/]+)|i', $agent, $match ) ) {
                             return $match[0] ;
                            } else
                             if ( preg_match( '|NEC([^\s\/]+)|i', $agent, $match ) ) {
                              return $match[0] ;
                             } else
                              if ( preg_match( '|ASUS([^\s\/]+)|i', $agent, $match ) ) {
                               return $match[0] ;
                              } else
                               if ( preg_match( '|Toshiba([^\_\/]+)|i', $agent, $match ) ) {
                                return $match[0] ;
                               } else
                                if ( preg_match( '|BenQ([^\s\/]+)|i', $agent, $match ) ) {
                                 return $match[0] ;
                                } else
                                 if ( preg_match( '|Palm-([^\s\/\;]+)|i', $agent, $match ) ) {
                                  return $match[0] ;
                                 } else
                                  if ( preg_match( '|Palm([^\/]+)|i', $agent, $match ) ) {
                                   return $match[0] ;
                                  } else
                                   if ( preg_match( '|Qtek([^\/]+)|i', $agent, $match ) ) {
                                    return $match[0] ;
                                   } else
                                    if ( preg_match( '|Amoi([^\/]+)|i', $agent, $match ) ) {
                                     return $match[0] ;
                                    } else
                                     if ( preg_match( '|Telit([^\/]+)|i', $agent, $match ) ) {
                                      return $match[0] ;
                                     } else
                                      if ( preg_match( '|Sendo([^\/]+)|i', $agent, $match ) ) {
                                       return $match[0] ;
                                      } else
                                       if ( preg_match( '|Sanyo ([^\;\s\/]+)|i', $agent, $match ) ) {
                                        return $match[0] ;
                                       } else
                                        if ( preg_match( '|Sanyo([^\;\s\/]+)|i', $agent, $match ) ) {
                                         return $match[0] ;
                                        } else
                                         if ( preg_match( '|Huawei ([^\s\/]+)|i', $agent, $match ) ) {
                                          return $match[0] ;
                                         } else
                                          if ( preg_match( '|Huawei([^\s\/]+)|i', $agent, $match ) ) {
                                           return $match[0] ;
                                          } else
                                           if ( preg_match( '|Huawey([^\/]+)|i', $agent, $match ) ) {
                                            return $match[0] ;
                                           } else
                                            if ( preg_match( '|Nexian([^\s\/]+)|i', $agent, $match ) ) {
                                             return $match[0] ;
                                            } else
                                             if ( preg_match( '|Pantech ([^\s\/]+)|i', $agent, $match ) ) {
                                              return $match[0] ;
                                             } else
                                              if ( preg_match( '|Pantech([^\s\/]+)|i', $agent, $match ) ) {
                                               return $match[0] ;
                                              } else
                                               if ( preg_match( '|i-mobile([^\,\/]+)|i', $agent, $match ) ) {
                                                return $match[0] ;
                                               } else
                                                if ( preg_match( '|Micromax([^\s\/]+)|i', $agent, $match ) ) {
                                                 return $match[0] ;
                                                } else
                                                 if ( preg_match( '|Cricket([^\s\/]+)|i', $agent, $match ) ) {
                                                  return $match[0] ;
                                                 } else
                                                  if ( preg_match( '|Fly([^\s\/]+)|i', $agent, $match ) ) {
                                                   return $match[0] ;
                                                  } else
                                                   if ( preg_match( '|TIANYU-KTOUCH/([^\s\/]+)|i', $agent, $match ) ) {
                                                    return $match[0] ;
                                                   } else
                                                    if ( preg_match( '|AUDIOVOX([^\s\/]+)|i', $agent, $match ) ) {
                                                     return $match[0] ;
                                                    } else
                                                     if ( preg_match( '|LENOVO([^\s\/]+)|i', $agent, $match ) ) {
                                                      return $match[0] ;
                                                     } else
                                                      if ( preg_match( '|DOPOD([^\_\/\Build]+)|i', $agent, $match ) ) {
                                                       return $match[0] ;
                                                      } else
                                                       if ( preg_match( '|OPPO([^\/]+)|i', $agent, $match ) ) {
                                                        return $match[0] ;
                                                       } else
                                                        if ( preg_match( '|SPICE([^\s\/]+)|i', $agent, $match ) ) {
                                                         return $match[0] ;
                                                        } else
                                                         if ( preg_match( '|Meizu([^\;\/\Build]+)|i', $agent, $match ) ) {
                                                          return $match[0] ;
                                                         } else
                                                          if ( preg_match( '|Bird ([^\_\/]+)|i', $agent, $match ) ) {
                                                           return $match[0] ;
                                                          } else
                                                           if ( preg_match( '|Bird.([^\s\/]+)|i', $agent, $match ) ) {
                                                            return $match[0] ;
                                                           } else
                                                            if ( preg_match( '|INN([^\_\s\/]+)|i', $agent, $match ) ) {
                                                             return $match[0] ;
                                                            } else
                                                             if ( preg_match( '|CDM([^\s\/]+)|i', $agent, $match ) ) {
                                                              return $match[0] ;
                                                             } else
                                                              if ( preg_match( '|KWC([^\s\/]+)|i', $agent, $match ) ) {
                                                               return $match[0] ;
                                                              } else
                                                               if ( preg_match( '|LCT([^\s\/]+)|i', $agent, $match ) ) {
                                                                return $match[0] ;
                                                               } else
                                                                if ( preg_match( '|TCL([^\s\/]+)|i', $agent, $match ) ) {
                                                                 return $match[0] ;
                                                                } else
                                                                 if ( preg_match( '|TSM([^\s\/]+)|i', $agent, $match ) ) {
                                                                  return $match[0] ;
                                                                 } else
                                                                  if ( preg_match( '|Xda([^\s\/]+)|i', $agent, $match ) ) {
                                                                   return $match[0] ;
                                                                  } else
                                                                   if ( preg_match( '|ZT([^\(\/]+)|i', $agent, $match ) ) {
                                                                    return $match[0] ;
                                                                   } else
                                                                    if ( preg_match( '|RT([^\s\/]+)|i', $agent, $match ) ) {
                                                                     return $match[0] ;
                                                                    } else
                                                                     if ( preg_match( '|O2([^\s\/]+)|i', $agent, $match ) ) {
                                                                      return $match[0] ;
                                                                     } else
                                                                      if ( preg_match( '|KDDI-SN3I([^\s]*)|', $agent, $match ) ) {
                                                                       return $match[0] ;
                                                                      } else
                                                                       if ( preg_match( '|iPad([^\;]*)|', $agent, $match ) ) {
                                                                        return $match[0] ;
                                                                       } else
                                                                        if ( preg_match( "|PlayStation BB Navigator ([0-9\.]{3}+)|i", $agent, $match ) ) {
                                                                         return $match[0] ;
                                                                        } else
                                                                         if ( preg_match( "|PlayStation(\s)?([0-9]{1}+)|i", $agent, $match ) ) {
                                                                          return $match[0] ;
                                                                         } else
                                                                          if ( preg_match( "|PlayStation Portable|i", $agent, $match ) ) {
                                                                           return $match[0] ;
                                                                          } else
                                                                           if ( preg_match( "|UC Browser([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                            return $match[0] ;
                                                                           } else
                                                                            if ( preg_match( "|UCWEB([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                             return $match[0] ;
                                                                            } else
                                                                             if ( preg_match( "|Skyfire/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                              return $match[0] ;
                                                                             } else
                                                                              if ( preg_match( "|Opera Mini(/)?([0-9\.]{0,3}+)|", $agent, $match ) ) {
                                                                               return $match[0] ;
                                                                              } else
                                                                               if ( preg_match( "|Opera Mobi/([a-z0-9\-]{1,3}+)|i", $agent, $match ) && preg_match( "|Version/([0-9\.]{4}+)|", $agent, $match ) ) {
                                                                                return str_replace( "Version/", "Opera Mobile/", $match[0] ) ;
                                                                               } else
                                                                                if ( preg_match( "|Opera Mobi/([a-z0-9\-]{1,3}+)|i", $agent, $match ) && preg_match( "|Opera ([0-9\.]{4}+)|", $agent, $match ) ) {
                                                                                 return str_replace( "Opera ", "Opera Mobile/", $match[0] ) ;
                                                                                } else
                                                                                 if ( preg_match( "|Bolt/([0-9\.]{3}+)|i", $agent, $match ) ) {
                                                                                  return $match[0] ;
                                                                                 } else
                                                                                  if ( preg_match( "|jB5/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                   return $match[0] ;
                                                                                  } else
                                                                                   if ( preg_match( "|TeaShark/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                    return $match[0] ;
                                                                                   } else
                                                                                    if ( preg_match( "|SoftBank/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                     return $match[0] ;
                                                                                    } else
                                                                                     if ( preg_match( "|NetFront/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                      return $match[0] ;
                                                                                     } else
                                                                                      if ( preg_match( "|IEMobile(/)?([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                       return $match[0] ;
                                                                                      } else
                                                                                       if ( preg_match( "|MobileExplorer/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                        return $match[0] ;
                                                                                       } else
                                                                                        if ( preg_match( "|Mobile Safari/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                         return $match[0] ;
                                                                                        } else
                                                                                         if ( preg_match( "|uZardWeb/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                          return $match[0] ;
                                                                                         } else
                                                                                          if ( preg_match( "|Iris/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                           return $match[0] ;
                                                                                          } else
                                                                                           if ( preg_match( "|Dolfin/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                            return $match[0] ;
                                                                                           } else
                                                                                            if ( preg_match( "|Minimo/([0-9\.]{4}+)|", $agent, $match ) ) {
                                                                                             return $match[0] ;
                                                                                            } else
                                                                                             if ( preg_match( "|Fennec/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                              return $match[0] ;
                                                                                             } else
                                                                                              if ( preg_match( "|Blazer ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                               return $match[0] ;
                                                                                              } else
                                                                                               if ( preg_match( "|portalmmm/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                return $match[0] ;
                                                                                               } else
                                                                                                if ( preg_match( "|MiniBrowser/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                 return $match[0] ;
                                                                                                } else
                                                                                                 if ( preg_match( "|Internet Channel/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                  return $match[0] ;
                                                                                                 } else
                                                                                                  if ( preg_match( "|Wii Internet Channel/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                   return $match[0] ;
                                                                                                  } else
                                                                                                   if ( preg_match( "|Wii Shop Channel/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                    return $match[0] ;
                                                                                                   } else
                                                                                                    if ( preg_match( "|Nintendo Wii|", $agent, $match ) ) {
                                                                                                     return $match[0] ;
                                                                                                    } else
                                                                                                     if ( preg_match( "|Maemo Browser ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                      return $match[0] ;
                                                                                                     } else
                                                                                                      if ( preg_match( "|TencentTraveler ([0-9\.]{0,3}+)|", $agent, $match ) ) {
                                                                                                       return $match[0] ;
                                                                                                      } else
                                                                                                       if ( preg_match( "|Google Wireless Transcoder|", $agent, $match ) ) {
                                                                                                        return $match[0] ;
                                                                                                       } else
                                                                                                        if ( preg_match( "|Netscape(/)?([0-9\.]{1,3}+)|", $agent, $match ) ) {
                                                                                                         return $match[0] ;
                                                                                                        } else
                                                                                                         if ( preg_match( "|Navigator/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                          return $match[0] ;
                                                                                                         } else
                                                                                                          if ( preg_match( "|SeaMonkey/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                           return $match[0] ;
                                                                                                          } else
                                                                                                           if ( preg_match( "|Firebird/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                            return $match[0] ;
                                                                                                           } else
                                                                                                            if ( preg_match( "|Blackbird/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                             return $match[0] ;
                                                                                                            } else
                                                                                                             if ( preg_match( "|BlackHawk/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                              return $match[0] ;
                                                                                                             } else
                                                                                                              if ( preg_match( "|Cheshire/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                               return $match[0] ;
                                                                                                              } else
                                                                                                               if ( preg_match( "|CometBird/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                return $match[0] ;
                                                                                                               } else
                                                                                                                if ( preg_match( "|Deepnet Explorer ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                 return $match[0] ;
                                                                                                                } else
                                                                                                                 if ( preg_match( "|Flock/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                  return $match[0] ;
                                                                                                                 } else
                                                                                                                  if ( preg_match( "|Orca/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                   return $match[0] ;
                                                                                                                  } else
                                                                                                                   if ( preg_match( "|OmniWeb/(v)?([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                    return $match[0] ;
                                                                                                                   } else
                                                                                                                    if ( preg_match( "|Epiphany/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                     return $match[0] ;
                                                                                                                    } else
                                                                                                                     if ( preg_match( "|MultiZilla v([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                      return $match[0] ;
                                                                                                                     } else
                                                                                                                      if ( preg_match( "|Multi-Browser ([0-9\.]{4}+)|", $agent, $match ) ) {
                                                                                                                       return $match[0] ;
                                                                                                                      } else
                                                                                                                       if ( preg_match( "|UltraBrowser ([0-9\.]{4}+)|", $agent, $match ) ) {
                                                                                                                        return $match[0] ;
                                                                                                                       } else
                                                                                                                        if ( preg_match( "|Comodo_Dragon/([0-9\.]{3,4}+)|", $agent, $match ) ) {
                                                                                                                         return $match[0] ;
                                                                                                                        } else
                                                                                                                         if ( preg_match( "|QQBrowser/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                          return $match[0] ;
                                                                                                                         } else
                                                                                                                          if ( preg_match( "|Maxthon(/)?(\s)?([0-9\.]{0,3}+)|", $agent, $match ) ) {
                                                                                                                           return $match[0] ;
                                                                                                                          } else
                                                                                                                           if ( preg_match( "|RockMelt/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                            return $match[0] ;
                                                                                                                           } else
                                                                                                                            if ( preg_match( "|Chrome/([0-9\.]{3,4}+)|", $agent, $match ) ) {
                                                                                                                             return $match[0] ;
                                                                                                                            } else
                                                                                                                             if ( preg_match( "|Avant Browser|", $agent, $match ) ) {
                                                                                                                              return $match[0] ;
                                                                                                                             } else
                                                                                                                              if ( preg_match( "|Opera/([0-9\.]{4}+)|", $agent, $match ) && preg_match( "|Version/([0-9\.]{4}+)|", $agent, $match ) ) {
                                                                                                                               return str_replace( "Version/", "Opera ", $match[0] ) ;
                                                                                                                              } else
                                                                                                                               if ( preg_match( "|Opera/([0-9\.]{3,4}+)|", $agent, $match ) ) {
                                                                                                                                return $match[0] ;
                                                                                                                               } else
                                                                                                                                if ( preg_match( "|Opera ([0-9\.]{3,4}+)|", $agent, $match ) ) {
                                                                                                                                 return $match[0] ;
                                                                                                                                } else
                                                                                                                                 if ( preg_match( "|Firefox/([0-9\.]{3,4}+)|", $agent, $match ) ) {
                                                                                                                                  return $match[0] ;
                                                                                                                                 } else
                                                                                                                                  if ( preg_match( "|Ninesky-android-mobile/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                   return "Ninesky/" . $match[1] ;
                                                                                                                                  } else
                                                                                                                                   if ( preg_match( "|AOL ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                    return $match[0] ;
                                                                                                                                   } else
                                                                                                                                    if ( preg_match( "|MSIE ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                     return $match[0] ;
                                                                                                                                    } else
                                                                                                                                     if ( preg_match( "|Version/([0-9\.]{3}+)|", $agent, $match ) && preg_match( "|Safari/([0-9\.]{3}+)|", $agent, $matche ) ) {
                                                                                                                                      return str_replace( "Version/", "Safari ", $match[0] ) ;
                                                                                                                                     } else
                                                                                                                                      if ( preg_match( "|Safari/([0-9]{3}+)|", $agent, $match ) ) {
                                                                                                                                       return $match[0] ;
                                                                                                                                      } else
                                                                                                                                       if ( preg_match( "|K-Meleon/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                        return $match[0] ;
                                                                                                                                       } else
                                                                                                                                        if ( preg_match( "|Konqueror/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                         return $match[0] ;
                                                                                                                                        } else
                                                                                                                                         if ( preg_match( "|Camino/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                          return $match[0] ;
                                                                                                                                         } else
                                                                                                                                          if ( preg_match( "|Lynx/([0-9\.\-]{3}+)|", $agent, $match ) ) {
                                                                                                                                           return $match[0] ;
                                                                                                                                          } else
                                                                                                                                           if ( preg_match( "|AvantGo ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                            return $match[0] ;
                                                                                                                                           } else
                                                                                                                                            if ( preg_match( "|EudoraWeb ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                             return $match[0] ;
                                                                                                                                            } else
                                                                                                                                             if ( preg_match( "|Thunderbird/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                              return $match[0] ;
                                                                                                                                             } else
                                                                                                                                              if ( preg_match( "|iTunes/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                               return $match[0] ;
                                                                                                                                              } else
                                                                                                                                               if ( preg_match( "|QuickTime/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                return $match[0] ;
                                                                                                                                               } else
                                                                                                                                                if ( preg_match( "|Windows-Media-Player/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                 return $match[0] ;
                                                                                                                                                } else
                                                                                                                                                 if ( preg_match( "|Galeon/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                  return $match[0] ;
                                                                                                                                                 } else
                                                                                                                                                  if ( preg_match( "|Amiga-AWeb/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                   return $match[0] ;
                                                                                                                                                  } else
                                                                                                                                                   if ( preg_match( "|AmigaVoyager/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                    return $match[0] ;
                                                                                                                                                   } else
                                                                                                                                                    if ( preg_match( "|iCab ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                     return $match[0] ;
                                                                                                                                                    } else
                                                                                                                                                     if ( preg_match( "|amaya/([0-9\.]{3,4}+)|", $agent, $match ) ) {
                                                                                                                                                      return $match[0] ;
                                                                                                                                                     } else
                                                                                                                                                      if ( preg_match( "|facebook bot|", $agent, $match ) ) {
                                                                                                                                                       return $match[0] ;
                                                                                                                                                      } else
                                                                                                                                                       if ( preg_match( "|facebookscraper/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                        return $match[0] ;
                                                                                                                                                       } else
                                                                                                                                                        if ( preg_match( "|facebookexternalhit/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                         return $match[0] ;
                                                                                                                                                        } else
                                                                                                                                                         if ( preg_match( "|Facebook FirePHP/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                          return $match[0] ;
                                                                                                                                                         } else
                                                                                                                                                          if ( preg_match( "|Facebook API PHP([0-9]{1}+)|", $agent, $match ) ) {
                                                                                                                                                           return $match[0] ;
                                                                                                                                                          } else
                                                                                                                                                           if ( preg_match( "|GTB([0-9\.]{1,3}+)|", $agent, $match ) ) {
                                                                                                                                                            return $match[0] ;
                                                                                                                                                           } else
                                                                                                                                                            if ( preg_match( "|YTB([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                             return $match[0] ;
                                                                                                                                                            } else
                                                                                                                                                             if ( preg_match( "|Google/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                              return $match[0] ;
                                                                                                                                                             } else
                                                                                                                                                              if ( preg_match( "|Googlebot(/)?(\s)?([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                               return $match[0] ;
                                                                                                                                                              } else
                                                                                                                                                               if ( preg_match( "|Googlebot-Mobile/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                return $match[0] ;
                                                                                                                                                               } else
                                                                                                                                                                if ( preg_match( "|Googlebot FirePHP([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                } else
                                                                                                                                                                 if ( preg_match( "|Googlebot-Image(/)?(\s)?([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                 } else
                                                                                                                                                                  if ( preg_match( "|Googlebot-Earth/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                  } else
                                                                                                                                                                   if ( preg_match( "|Googlebot-Sitemaps/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                   } else
                                                                                                                                                                    if ( preg_match( "|Googlebot-Site-Verification/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                    } else
                                                                                                                                                                     if ( preg_match( "|Mediapartners-Google/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                     } else
                                                                                                                                                                      if ( preg_match( "|Mediapartners-Google/PHP-proxy|", $agent, $match ) ) {
                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                      } else
                                                                                                                                                                       if ( preg_match( "|Mediapartners-Google|", $agent, $match ) ) {
                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                       } else
                                                                                                                                                                        if ( preg_match( "|AdsBot-Google-Mobile|", $agent, $match ) ) {
                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                        } else
                                                                                                                                                                         if ( preg_match( "|AdsBot-Google|", $agent, $match ) ) {
                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                         } else
                                                                                                                                                                          if ( preg_match( "|AppEngine-Google|", $agent, $match ) ) {
                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                          } else
                                                                                                                                                                           if ( preg_match( "|FeedFetcher-Google|", $agent, $match ) ) {
                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                           } else
                                                                                                                                                                            if ( preg_match( "|AOL Search|", $agent, $match ) ) {
                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                            } else
                                                                                                                                                                             if ( preg_match( "|AskBar ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                             } else
                                                                                                                                                                              if ( preg_match( "|TeomaBar ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                              } else
                                                                                                                                                                               if ( preg_match( "|Ask Jeeves/Teoma|", $agent, $match ) ) {
                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                               } else
                                                                                                                                                                                if ( preg_match( "|Ask Jeeves Corporate Spider|", $agent, $match ) ) {
                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                } else
                                                                                                                                                                                 if ( preg_match( "|FunWebProducts-AskJeeves|", $agent, $match ) ) {
                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                 } else
                                                                                                                                                                                  if ( preg_match( "|BingSearch/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                  } else
                                                                                                                                                                                   if ( preg_match( "|bingbot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                   } else
                                                                                                                                                                                    if ( preg_match( "|Msnbot(/)?(\s)?([0-9\.]{3}+)|i", $agent, $match ) ) {
                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                    } else
                                                                                                                                                                                     if ( preg_match( "|msnbot-media/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                     } else
                                                                                                                                                                                      if ( preg_match( "|msnbot-Products/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                      } else
                                                                                                                                                                                       if ( preg_match( "|MSNAttackBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                       } else
                                                                                                                                                                                        if ( preg_match( "|MSMOBOT/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                        } else
                                                                                                                                                                                         if ( preg_match( "|MSNBOT-MOBILE/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                         } else
                                                                                                                                                                                          if ( preg_match( "|MSMOBOT Mozilla/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                          } else
                                                                                                                                                                                           if ( preg_match( "|MSMOBOT CHTML|", $agent, $match ) ) {
                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                           } else
                                                                                                                                                                                            if ( preg_match( "|Twitterbot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                            } else
                                                                                                                                                                                             if ( preg_match( "|Twitterrific/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                             } else
                                                                                                                                                                                              if ( preg_match( "|TwitterFonPro/([0-9]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                              } else
                                                                                                                                                                                               if ( preg_match( "|TwitterResearch|", $agent, $match ) ) {
                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                               } else
                                                                                                                                                                                                if ( preg_match( "|TwitterIrcGateway|", $agent, $match ) ) {
                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                } else
                                                                                                                                                                                                 if ( preg_match( "|Yandex/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                 } else
                                                                                                                                                                                                  if ( preg_match( "|YandexBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                  } else
                                                                                                                                                                                                   if ( preg_match( "|YandexMedia/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                   } else
                                                                                                                                                                                                    if ( preg_match( "|YandexImages/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                    } else
                                                                                                                                                                                                     if ( preg_match( "|YandexFavicons/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                     } else
                                                                                                                                                                                                      if ( preg_match( "|YandexZakladki/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                      } else
                                                                                                                                                                                                       if ( preg_match( "|YandexAntivirus/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                       } else
                                                                                                                                                                                                        if ( preg_match( "|yahoobot|", $agent, $match ) ) {
                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                        } else
                                                                                                                                                                                                         if ( preg_match( "|Y!J-([a-z0-9\.\/]{7}+)|i", $agent, $match ) ) {
                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                         } else
                                                                                                                                                                                                          if ( preg_match( "|Yahoo! Slurp/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                          } else
                                                                                                                                                                                                           if ( preg_match( "|Yahoo! Slurp|", $agent, $match ) ) {
                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                           } else
                                                                                                                                                                                                            if ( preg_match( "|Yahoo-Test/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                            } else
                                                                                                                                                                                                             if ( preg_match( "|Yahoo-Blogs/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                             } else
                                                                                                                                                                                                              if ( preg_match( "|YahooSeeker/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                              } else
                                                                                                                                                                                                               if ( preg_match( "|YahooFeedSeeker/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                               } else
                                                                                                                                                                                                                if ( preg_match( "|YahooSeeker-Testing/v([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                } else
                                                                                                                                                                                                                 if ( preg_match( "|Bloglines/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                 } else
                                                                                                                                                                                                                  if ( preg_match( "|Bloglines-Images/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                                  } else
                                                                                                                                                                                                                   if ( preg_match( "|Baiduspider/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                                   } else
                                                                                                                                                                                                                    if ( preg_match( "|Baiduspider-image+|", $agent, $match ) ) {
                                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                                    } else
                                                                                                                                                                                                                     if ( preg_match( "|Baiduspider-favo+|", $agent, $match ) ) {
                                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                                     } else
                                                                                                                                                                                                                      if ( preg_match( "|Baiduspider+|", $agent, $match ) ) {
                                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                                      } else
                                                                                                                                                                                                                       if ( preg_match( "|archive_crawler/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                                       } else
                                                                                                                                                                                                                        if ( preg_match( "|ia_archiver/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                                        } else
                                                                                                                                                                                                                         if ( preg_match( "|ia_archiver|", $agent, $match ) ) {
                                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                                         } else
                                                                                                                                                                                                                          if ( preg_match( "|Perl Crawler Robot v([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                                          } else
                                                                                                                                                                                                                           if ( preg_match( "|Python-httplib([0-9]{1}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                                           } else
                                                                                                                                                                                                                            if ( preg_match( "|Python-urllib/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                                            } else
                                                                                                                                                                                                                             if ( preg_match( "|Python ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                                             } else
                                                                                                                                                                                                                              if ( preg_match( "|PECL::HTTP/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                                              } else
                                                                                                                                                                                                                               if ( preg_match( "|PEAR HTTP|", $agent, $match ) ) {
                                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                                               } else
                                                                                                                                                                                                                                if ( preg_match( "|HTTP_Request2/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                                } else
                                                                                                                                                                                                                                 if ( preg_match( "|WordPress-Do-P-/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                                 } else
                                                                                                                                                                                                                                  if ( preg_match( "|WordPress-B-/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                                                  } else
                                                                                                                                                                                                                                   if ( preg_match( "|WordPress/([a-z0-9\.]{3}+)|i", $agent, $match ) ) {
                                                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                                                   } else
                                                                                                                                                                                                                                    if ( preg_match( "|WordPress|", $agent, $match ) ) {
                                                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                                                    } else
                                                                                                                                                                                                                                     if ( preg_match( "|WWW-Mechanize/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                                                     } else
                                                                                                                                                                                                                                      if ( preg_match( "|DoCoMo/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                                                      } else
                                                                                                                                                                                                                                       if ( preg_match( "|Charlotte/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                                                       } else
                                                                                                                                                                                                                                        if ( preg_match( "|ZyBorg/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                                                        } else
                                                                                                                                                                                                                                         if ( preg_match( "|event_fetcher/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                                                         } else
                                                                                                                                                                                                                                          if ( preg_match( "|gonzo/([0-9]{1}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                                                          } else
                                                                                                                                                                                                                                           if ( preg_match( "|gonzo([0-9]{1}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                                                           } else
                                                                                                                                                                                                                                            if ( preg_match( "|Semager/([0-9]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                                                            } else
                                                                                                                                                                                                                                             if ( preg_match( "|ReqwirelessWeb/([0-9]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                                                             } else
                                                                                                                                                                                                                                              if ( preg_match( '|http://Anonymouse.org|', $agent, $match ) ) {
                                                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                                                              } else
                                                                                                                                                                                                                                               if ( preg_match( "|http://www.80legs.com|", $agent, $match ) ) {
                                                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                                                               } else
                                                                                                                                                                                                                                                if ( preg_match( "|iCjobs Stellenangebote Jobs|", $agent, $match ) ) {
                                                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                                                } else
                                                                                                                                                                                                                                                 if ( preg_match( "|Seznam screenshot-generator|", $agent, $match ) ) {
                                                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                                                 } else
                                                                                                                                                                                                                                                  if ( preg_match( '|Download Master|', $agent, $match ) ) {
                                                                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                                                                  } else
                                                                                                                                                                                                                                                   if ( preg_match( "|OPENWAVE|", $agent, $match ) ) {
                                                                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                                                                   } else
                                                                                                                                                                                                                                                    if ( preg_match( "|MAUI|i", $agent, $match ) ) {
                                                                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                                                                    } else
                                                                                                                                                                                                                                                     if ( preg_match( "|Twiceler|", $agent, $match ) ) {
                                                                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                                                                     } else
                                                                                                                                                                                                                                                      if ( preg_match( "|Teemer|", $agent, $match ) ) {
                                                                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                                                                      } else
                                                                                                                                                                                                                                                       if ( preg_match( "|ELinks|", $agent, $match ) ) {
                                                                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                                                                       } else
                                                                                                                                                                                                                                                        if ( preg_match( "|yacybot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                                                                        } else
                                                                                                                                                                                                                                                         if ( preg_match( "|cometrics-bot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                                                                         } else
                                                                                                                                                                                                                                                          if ( preg_match( "|infometrics-bot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                                                                          } else
                                                                                                                                                                                                                                                           if ( preg_match( "|webmeasurement-bot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                                                                           } else
                                                                                                                                                                                                                                                            if ( preg_match( "|Linguee Bot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                                                                            } else
                                                                                                                                                                                                                                                             if ( preg_match( "|SEOkicks-Robot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                                                                             } else
                                                                                                                                                                                                                                                              if ( preg_match( "|Cityreview Robot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                                                                              } else
                                                                                                                                                                                                                                                               if ( preg_match( "|URL-Expander-Bot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                                                                               } else
                                                                                                                                                                                                                                                                if ( preg_match( "|Yanga WorldSearch Bot|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                                                                } else
                                                                                                                                                                                                                                                                 if ( preg_match( "|Speedy Spider|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                                                                 } else
                                                                                                                                                                                                                                                                  if ( preg_match( "|Nusearch Spider|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                                                                                  } else
                                                                                                                                                                                                                                                                   if ( preg_match( "|iCCrawler|i", $agent, $match ) ) {
                                                                                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                                                                                   } else
                                                                                                                                                                                                                                                                    if ( preg_match( "|MSIECrawler|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                                                                                    } else
                                                                                                                                                                                                                                                                     if ( preg_match( "|GVC WEB crawler|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                                                                                     } else
                                                                                                                                                                                                                                                                      if ( preg_match( "|LINK TRADE crawler|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                                                                                      } else
                                                                                                                                                                                                                                                                       if ( preg_match( "|Krugle web crawler|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                                                                                       } else
                                                                                                                                                                                                                                                                        if ( preg_match( "|([a-z]+)/Nutch-([0-9\.]{3}+)|i", $agent, $match ) ) {
                                                                                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                                                                                        } else
                                                                                                                                                                                                                                                                         if ( preg_match( "|GarlikCrawler/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                                                                                         } else
                                                                                                                                                                                                                                                                          if ( preg_match( "|NimbleCrawler ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                                                                                          } else
                                                                                                                                                                                                                                                                           if ( preg_match( "|Plukkie/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                                                                                           } else
                                                                                                                                                                                                                                                                            if ( preg_match( "|Acoon-Robot v([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                                                                                            } else
                                                                                                                                                                                                                                                                             if ( preg_match( "|MJ12bot/v([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                                                                                             } else
                                                                                                                                                                                                                                                                              if ( preg_match( "|discobot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                                                                                              } else
                                                                                                                                                                                                                                                                               if ( preg_match( "|spbot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                                                                                               } else
                                                                                                                                                                                                                                                                                if ( preg_match( "|aiHitBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                                                                                } else
                                                                                                                                                                                                                                                                                 if ( preg_match( "|DBLBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                                                                                 } else
                                                                                                                                                                                                                                                                                  if ( preg_match( "|DotBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                                                                                                  } else
                                                                                                                                                                                                                                                                                   if ( preg_match( "|SiteBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                                                                                                   } else
                                                                                                                                                                                                                                                                                    if ( preg_match( "|NaverBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                                                                                                    } else
                                                                                                                                                                                                                                                                                     if ( preg_match( "|Gigamega.bot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                                                                                                     } else
                                                                                                                                                                                                                                                                                      if ( preg_match( "|MyFamilyBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                                                                                                      } else
                                                                                                                                                                                                                                                                                       if ( preg_match( "|Webbot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                                                                                                       } else
                                                                                                                                                                                                                                                                                        if ( preg_match( "|Exabot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                                                                                                        } else
                                                                                                                                                                                                                                                                                         if ( preg_match( "|MojeekBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                                                                                                         } else
                                                                                                                                                                                                                                                                                          if ( preg_match( "|eCairn-Grabber/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                                                                                                          } else
                                                                                                                                                                                                                                                                                           if ( preg_match( "|Java/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                                                                                                           } else
                                                                                                                                                                                                                                                                                            if ( preg_match( "|LinkWalker/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                                                                                                            } else
                                                                                                                                                                                                                                                                                             if ( preg_match( "|LiteFinder/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                                                                                                             } else
                                                                                                                                                                                                                                                                                              if ( preg_match( "|Sogou web spider/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                                                                                                              } else
                                                                                                                                                                                                                                                                                               if ( preg_match( "|WebAlta Crawler/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                                                                                                               } else
                                                                                                                                                                                                                                                                                                if ( preg_match( "|WebCopier v([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                                                                                                } else
                                                                                                                                                                                                                                                                                                 if ( preg_match( "|Web Downloader/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                                                                                                 } else
                                                                                                                                                                                                                                                                                                  if ( preg_match( "|Offline Explorer/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                   return $match[0] ;
                                                                                                                                                                                                                                                                                                  } else
                                                                                                                                                                                                                                                                                                   if ( preg_match( "|SuperBot/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                    return $match[0] ;
                                                                                                                                                                                                                                                                                                   } else
                                                                                                                                                                                                                                                                                                    if ( preg_match( "|WebZIP/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                     return $match[0] ;
                                                                                                                                                                                                                                                                                                    } else
                                                                                                                                                                                                                                                                                                     if ( preg_match( "|Wget/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                      return $match[0] ;
                                                                                                                                                                                                                                                                                                     } else
                                                                                                                                                                                                                                                                                                      if ( preg_match( "|GNU/wget ([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                       return $match[0] ;
                                                                                                                                                                                                                                                                                                      } else
                                                                                                                                                                                                                                                                                                       if ( preg_match( "|W3C-checklink/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                        return $match[0] ;
                                                                                                                                                                                                                                                                                                       } else
                                                                                                                                                                                                                                                                                                        if ( preg_match( "|W3C_Validator/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                         return $match[0] ;
                                                                                                                                                                                                                                                                                                        } else
                                                                                                                                                                                                                                                                                                         if ( preg_match( '|Snoopy v([0-9\.]{3}+)|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                          return $match[0] ;
                                                                                                                                                                                                                                                                                                         } else
                                                                                                                                                                                                                                                                                                          if ( preg_match( '|DA ([0-9\.]{3}+)|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                           return $match[0] ;
                                                                                                                                                                                                                                                                                                          } else
                                                                                                                                                                                                                                                                                                           if ( preg_match( '|SmallProxy ([0-9\.]{3}+)|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                            return $match[0] ;
                                                                                                                                                                                                                                                                                                           } else
                                                                                                                                                                                                                                                                                                            if ( preg_match( "|Mozilla/([0-9\.]{3}+)|", $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                             return $match[0] ;
                                                                                                                                                                                                                                                                                                            } else
                                                                                                                                                                                                                                                                                                             if ( preg_match( '|Microsoft-WebDAV-MiniRedir/([0-9\.]{3}+)|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                              return $match[0] ;
                                                                                                                                                                                                                                                                                                             } else
                                                                                                                                                                                                                                                                                                              if ( preg_match( '|Microsoft Pocket Internet Explorer/([0-9\.]{3}+)|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                               return $match[0] ;
                                                                                                                                                                                                                                                                                                              } else
                                                                                                                                                                                                                                                                                                               if ( preg_match( '|Microsoft URL Control|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                                return $match[0] ;
                                                                                                                                                                                                                                                                                                               } else
                                                                                                                                                                                                                                                                                                                if ( preg_match( '|Microsoft Office Protocol Discovery|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                                 return $match[0] ;
                                                                                                                                                                                                                                                                                                                } else
                                                                                                                                                                                                                                                                                                                 if ( preg_match( '|Microsoft Data Access Internet Publishing Provider Protocol Discovery|', $agent, $match ) ) {
                                                                                                                                                                                                                                                                                                                  return $match[0] ;
                                                                                                                                                                                                                                                                                                                 } else {
                                                                                                                                                                                                                                                                                                                  return "Unknown" ;
                                                                                                                                                                                                                                                                                                                 }
 }

?>