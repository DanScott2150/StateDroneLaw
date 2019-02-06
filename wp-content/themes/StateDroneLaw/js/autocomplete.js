
$( function() {
  var availableTags = [
                       { value: "Alabama",
                         label: "AL - Alabama Drone Laws"
                       },
                       { value: "Alaska",
                         label: "AK - Alaska Drone Laws"
                       },
                       { value: "Arizona",
                         label: "AZ - Arizona Drone Laws"
                       },
                       { value: "Arkansas",
                         label: "AR - Arkansas Drone Laws"
                       },
                       { value: "California",
                         label: "CA - California Drone Laws"
                       },
                       { value: "Colorado",
                         label: "CO - Colorado Drone Laws"
                       },
                       { value: "Connecticut",
                         label: "CT - Connecticut Drone Laws"
                       },
                       { value: "Delaware",
                         label: "DE - Delaware Drone Laws"
                       },
                       { value: "Florida",
                         label: "FL - Florida Drone Laws"
                       },
                       { value: "Georgia",
                         label: "GA - Georgia Drone Laws"
                       },
                       { value: "Hawaii",
                         label: "HI - Hawaii Drone Laws"
                       },
                       { value: "Idaho",
                         label: "ID - Idaho Drone Laws"
                       },
                       { value: "Illinois",
                         label: "IL - Illinois Drone Laws"
                       },
                       { value: "Indiana",
                         label: "IN - Indiana Drone Laws"
                       },
                       { value: "Iowa",
                         label: "IA - Iowa Drone Laws"
                       },
                       { value: "Kansas",
                         label: "KS - Kansas Drone Laws"
                       },
                       { value: "Kentucky",
                         label: "KY - Kentucky Drone Laws"
                       },
                       { value: "Louisiana",
                         label: "LA - Louisiana Drone Laws"
                       },
                       { value: "Maine",
                         label: "ME - Maine Drone Laws"
                       },
                       { value: "Maryland",
                         label: "MD - Maryland Drone Laws"
                       },
                       { value: "Massachusetts",
                         label: "MA - Massachusetts Drone Laws"
                       },
                       { value: "Michigan",
                         label: "MI - Michigan Drone Laws"
                       },
                       { value: "Minnesota",
                         label: "MN - Minnesota Drone Laws"
                       },
                       { value: "Mississippi",
                         label: "MS - Mississippi Drone Laws"
                       },
                       { value: "Missouri",
                         label: "MO - Missouri Drone Laws"
                       },
                       { value: "Montana",
                         label: "MT - Montana Drone Laws"
                       },
                       { value: "Nebraska",
                         label: "NE - Nebraska Drone Laws"
                       },
                       { value: "Nevada",
                         label: "NV - Nevada Drone Laws"
                       },
                       { value: "New-Hampshire",
                         label: "NH - New Hampshire Drone Laws"
                       },
                       { value: "New-Jersey",
                         label: "NJ - New Jersey Drone Laws"
                       },
                       { value: "New-Mexico",
                         label: "NM - New Mexico Drone Laws"
                       },
                       { value: "New-York",
                         label: "NY - New York Drone Laws"
                       },
                       { value: "North-Carolina",
                         label: "NC - North Carolina Drone Laws"
                       },
                       { value: "North-Dakota",
                         label: "ND - North Dakota Drone Laws"
                       },
                       { value: "Ohio",
                         label: "OH - Ohio Drone Laws"
                       },
                       { value: "Oklahoma",
                         label: "OK - Oklahoma Drone Laws"
                       },
                       { value: "Oregon",
                         label: "OR - Oregon Drone Laws"
                       },
                       { value: "Pennsylvania",
                         label: "PA - Pennsylvania Drone Laws"
                       },
                       { value: "Rhode-Island",
                         label: "RI - Rhode Island Drone Laws"
                       },
                       { value: "South-Carolina",
                         label: "SC - South Carolina Drone Laws"
                       },
                       { value: "South-Dakota",
                         label: "SD - South Dakota Drone Laws"
                       },
                       { value: "Tennessee",
                         label: "TN - Tennessee Drone Laws"
                       },
                       { value: "Texas",
                         label: "TX - Texas Drone Laws"
                       },
                       { value: "Utah",
                         label: "UT - Utah Drone Laws"
                       },
                       { value: "Vermont",
                         label: "VT - Vermont Drone Laws"
                       },
                       { value: "Virginia",
                         label: "VA - Virginia Drone Laws"
                       },
                       { value: "Washington",
                         label: "WA - Washington Drone Laws"
                       },
                       { value: "West Virginia",
                         label: "WV - West Virginia Drone Laws"
                       },
                       { value: "Wisconsin",
                         label: "WI - Wisconsin Drone Laws"
                       },
                       { value: "Wyoming",
                         label: "WY - Wyoming Drone Laws"
                       },
                     ];

  $( "#tags" ).autocomplete({
              source: availableTags,
            select: function( event, ui ) {
                window.location.href = "/state/" + ui.item.value;
            }
            });
          } );
