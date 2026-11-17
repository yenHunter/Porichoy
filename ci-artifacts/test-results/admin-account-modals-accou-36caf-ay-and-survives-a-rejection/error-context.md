# Instructions

- Following Playwright test failed.
- Explain why, be concise, respect Playwright best practices.
- Provide a snippet of code with the fix, if possible.

# Test info

- Name: admin/account-modals.spec.js >> account modals >> the picture is uploaded, removed from the avatar overlay and survives a rejection
- Location: e2e/admin/account-modals.spec.js:123:5

# Error details

```
Error: expect(locator).toHaveCount(expected) failed

Locator:  locator('.modal-backdrop')
Expected: 0
Received: 1
Timeout:  10000ms

Call log:
  - Expect "toHaveCount" locator('.modal-backdrop') with timeout 10000ms
  - waiting for locator('.modal-backdrop')
    24 × locator resolved to 1 element
       - unexpected value "1"

```

# Page snapshot

```yaml
- generic [ref=f1e2]:
  - generic [ref=f1e3]:
    - link [ref=f1e4] [cursor=pointer]:
      - /url: http://127.0.0.1:8110/home
      - img "logo" [ref=f1e7]
    - text: ｂ 
    - region "scrollable content" [ref=f1e12]:
      - generic [ref=f1e13]:
        - text:       奄
        - list [ref=f1e14]:
          - listitem: Navigation
          - listitem [ref=f1e15]:
            - link "Dashboard" [ref=f1e16] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/home
          - listitem [ref=f1e23]:
            - link "Website" [ref=f1e24] [cursor=pointer]:
              - /url: http://127.0.0.1:8110
          - listitem: Modules
          - listitem [ref=f1e32]:
            - link "Education" [ref=f1e33] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/module/education
          - listitem [ref=f1e39]:
            - link "Experience" [ref=f1e40] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/module/experience
          - listitem [ref=f1e46]:
            - link "Research" [ref=f1e47] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/module/research
          - listitem [ref=f1e52]:
            - link " Training" [ref=f1e53] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/module/training
              - generic [ref=f1e54]: 
              - generic [ref=f1e56]: Training
          - listitem [ref=f1e57]:
            - link "Blog" [ref=f1e58] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/module/blog
          - listitem: Elements
          - listitem [ref=f1e65]:
            - link "Skills" [ref=f1e66] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/element/skill
          - listitem [ref=f1e71]:
            - link "Services" [ref=f1e72] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/element/service
          - listitem [ref=f1e77]:
            - link "Clients" [ref=f1e78] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/element/client
          - listitem [ref=f1e86]:
            - link "Projects" [ref=f1e87] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/element/project
          - listitem [ref=f1e93]:
            - link "Testimonials" [ref=f1e94] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/element/testimonial
          - listitem: Management
          - listitem [ref=f1e99]:
            - link "User" [ref=f1e100] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/management/user
          - listitem [ref=f1e115]:
            - link "Contact Request" [ref=f1e116] [cursor=pointer]:
              - /url: http://127.0.0.1:8110/management/contact-message
          - listitem [ref=f1e123]:
            - link "Settings " [ref=f1e124] [cursor=pointer]:
              - /url: "#settings"
              - generic [ref=f1e129]: Settings
              - generic [ref=f1e130]: 
          - listitem [ref=f1e131]:
            - link "System " [ref=f1e132] [cursor=pointer]:
              - /url: "#system"
              - generic [ref=f1e136]: System
              - generic [ref=f1e137]: 
          - listitem [ref=f1e138]:
            - link "Configuration " [ref=f1e139] [cursor=pointer]:
              - /url: "#configuration"
              - generic [ref=f1e152]: Configuration
              - generic [ref=f1e153]: 
  - banner [ref=f1e154]:
    - generic [ref=f1e155]:
      - generic [ref=f1e156]:
        - button "ｂ" [ref=f1e157] [cursor=pointer]
        - text: ｂ
      - generic [ref=f1e159]:
        - searchbox "Quick Search..." [ref=f1e161]
        - button [ref=f1e167] [cursor=pointer]:
          - img "user-image" [ref=f1e168]
        - generic [ref=f1e170]:
          - button "5" [ref=f1e171] [cursor=pointer]
          - text:         
        - button [ref=f1e178] [cursor=pointer]
        - button [ref=f1e186] [cursor=pointer]
        - button [ref=f1e193] [cursor=pointer]
        - generic [ref=f1e200]:
          - link "user-image Browser " [ref=f1e201] [cursor=pointer]:
            - /url: "#"
            - img "user-image" [ref=f1e202]
            - generic [ref=f1e203]:
              - heading "Browser" [level=5] [ref=f1e204]
              - generic [ref=f1e205]: 
          - text:  ﾟ  奄
  - dialog [active] [ref=f1e206]:
    - generic [ref=f1e208]:
      - generic [ref=f1e209]:
        - heading "My Profile" [level=5] [ref=f1e210]
        - button "Close" [ref=f1e211] [cursor=pointer]
      - generic [ref=f1e213]:
        - generic [ref=f1e214]:
          - generic [ref=f1e215]: First name
          - textbox "First name" [ref=f1e216]: Browser
        - generic [ref=f1e217]:
          - generic [ref=f1e218]: Last name
          - textbox "Last name" [ref=f1e219]: Tester
        - generic [ref=f1e220]:
          - generic [ref=f1e221]: Profile picture
          - generic [ref=f1e222]:
            - generic [ref=f1e223]:
              - img "Profile picture" [ref=f1e224]
              - button "Remove your profile picture" [ref=f1e225] [cursor=pointer]:
                - generic [ref=f1e226]: 
            - generic [ref=f1e227]:
              - button "Profile picture" [ref=f1e228] [cursor=pointer]
              - generic [ref=f1e229]: JPEG, PNG, GIF or WebP up to 10 MB. Stored as a 300px wide WebP.
        - generic [ref=f1e230]:
          - generic [ref=f1e231]: Email address
          - textbox "Email address" [disabled] [ref=f1e232]: e2e@example.com
          - generic [ref=f1e233]: Your email address cannot be changed.
      - generic [ref=f1e234]:
        - button "Cancel" [ref=f1e235] [cursor=pointer]
        - button "Save changes" [ref=f1e236] [cursor=pointer]
  - generic [ref=f1e237]:
    - generic [ref=f1e238]:
      - generic [ref=f1e239]:
        - heading "Dashboard" [level=4] [ref=f1e241]
        - list [ref=f1e243]:
          - listitem [ref=f1e244]:
            - link "Porichoy" [ref=f1e245] [cursor=pointer]:
              - /url: "javascript: void(0);"
          - listitem [ref=f1e246]:  Dashboard
      - generic [ref=f1e247]:
        - generic [ref=f1e251]:
          - generic [ref=f1e252]: 
          - generic [ref=f1e255]:
            - heading "$124.70K" [level=3] [ref=f1e256]
            - paragraph [ref=f1e257]: Total Sales
        - generic [ref=f1e261]:
          - generic [ref=f1e262]: 
          - generic [ref=f1e265]:
            - heading "2,358" [level=3] [ref=f1e266]
            - paragraph [ref=f1e267]: Orders Placed
        - generic [ref=f1e271]:
          - generic [ref=f1e272]: 
          - generic [ref=f1e275]:
            - heading "839" [level=3] [ref=f1e276]
            - paragraph [ref=f1e277]: Active Customers
        - generic [ref=f1e281]:
          - generic [ref=f1e282]: 
          - generic [ref=f1e285]:
            - heading "41" [level=3] [ref=f1e286]
            - paragraph [ref=f1e287]: Refund Requests
      - generic [ref=f1e292]:
        - generic [ref=f1e293]:
          - generic [ref=f1e294]:
            - heading "Total Sales" [level=4] [ref=f1e295]
            - paragraph [ref=f1e296]: You have 21 pending orders awaiting fulfillment.
          - separator [ref=f1e301]
        - generic [ref=f1e304]:
          - heading "Sales Analytics" [level=4] [ref=f1e305]
          - link "View Reports " [ref=f1e306] [cursor=pointer]:
            - /url: "#!"
            - text: View Reports
            - generic [ref=f1e307]: 
      - generic [ref=f1e311]:
        - generic [ref=f1e313]:
          - generic [ref=f1e314]:
            - heading "Product Inventory" [level=4] [ref=f1e315]
            - generic [ref=f1e316]:
              - link " Add Product" [ref=f1e317] [cursor=pointer]:
                - /url: http://127.0.0.1:8110/admin/ecommerce/add-product
                - generic [ref=f1e318]: 
                - text: Add Product
              - link " Export CSV" [ref=f1e319] [cursor=pointer]:
                - /url: javascript:void(0);
                - generic [ref=f1e320]: 
                - text: Export CSV
          - table [ref=f1e323]:
            - rowgroup [ref=f1e324]:
              - row [ref=f1e325]:
                - cell [ref=f1e326]:
                  - generic [ref=f1e328]:
                    - text: Audio
                    - heading [level=5] [ref=f1e329]:
                      - link "Wireless Earbuds" [ref=f1e330] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e331]:
                  - text: Stock
                  - heading "180 units" [level=5] [ref=f1e332]
                - cell [ref=f1e333]:
                  - text: Price
                  - heading "$59.90" [level=5] [ref=f1e334]
                - cell [ref=f1e335]:
                  - text: Ratings
                  - heading " (52)" [level=5] [ref=f1e336]:
                    - generic [ref=f1e337]: 
                    - link "(52)" [ref=f1e340] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e341]:
                  - text: Status
                  - heading "Active" [level=5] [ref=f1e342]
                - cell [ref=f1e343]:
                  - link "" [ref=f1e345] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e347]:
                - cell [ref=f1e348]:
                  - generic [ref=f1e350]:
                    - text: Accessories
                    - heading [level=5] [ref=f1e351]:
                      - link "Laptop Stand" [ref=f1e352] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e353]:
                  - text: Stock
                  - heading "45 units" [level=5] [ref=f1e354]
                - cell [ref=f1e355]:
                  - text: Price
                  - heading "$29.00" [level=5] [ref=f1e356]
                - cell [ref=f1e357]:
                  - text: Ratings
                  - heading "  (11)" [level=5] [ref=f1e358]:
                    - generic [ref=f1e359]:
                      - generic [ref=f1e360]: 
                      - generic [ref=f1e361]: 
                    - link "(11)" [ref=f1e363] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e364]:
                  - text: Status
                  - heading "Low Stock" [level=5] [ref=f1e365]
                - cell [ref=f1e366]:
                  - link "" [ref=f1e368] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e370]:
                - cell [ref=f1e371]:
                  - generic [ref=f1e373]:
                    - text: Gadgets
                    - heading [level=5] [ref=f1e374]:
                      - link "Drone Camera" [ref=f1e375] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e376]:
                  - text: Stock
                  - heading "0 units" [level=5] [ref=f1e377]
                - cell [ref=f1e378]:
                  - text: Price
                  - heading "$199.99" [level=5] [ref=f1e379]
                - cell [ref=f1e380]:
                  - text: Ratings
                  - heading [level=5] [ref=f1e381]:
                    - link "(8)" [ref=f1e383] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e384]:
                  - text: Status
                  - heading "Out of Stock" [level=5] [ref=f1e385]
                - cell [ref=f1e386]:
                  - link "" [ref=f1e388] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e390]:
                - cell [ref=f1e391]:
                  - generic [ref=f1e393]:
                    - text: Electronics
                    - heading [level=5] [ref=f1e394]:
                      - link "Portable Projector" [ref=f1e395] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e396]:
                  - text: Stock
                  - heading "32 units" [level=5] [ref=f1e397]
                - cell [ref=f1e398]:
                  - text: Price
                  - heading "$120.00" [level=5] [ref=f1e399]
                - cell [ref=f1e400]:
                  - text: Ratings
                  - heading "  (16)" [level=5] [ref=f1e401]:
                    - generic [ref=f1e402]:
                      - generic [ref=f1e403]: 
                      - generic [ref=f1e404]: 
                    - link "(16)" [ref=f1e406] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e407]:
                  - text: Status
                  - heading "Limited" [level=5] [ref=f1e408]
                - cell [ref=f1e409]:
                  - link "" [ref=f1e411] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e413]:
                - cell [ref=f1e414]:
                  - generic [ref=f1e416]:
                    - text: Mobiles
                    - heading [level=5] [ref=f1e417]:
                      - link "Smartphone G12" [ref=f1e418] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e419]:
                  - text: Stock
                  - heading "85 units" [level=5] [ref=f1e420]
                - cell [ref=f1e421]:
                  - text: Price
                  - heading "$499.00" [level=5] [ref=f1e422]
                - cell [ref=f1e423]:
                  - text: Ratings
                  - heading " (112)" [level=5] [ref=f1e424]:
                    - generic [ref=f1e425]: 
                    - link "(112)" [ref=f1e428] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e429]:
                  - text: Status
                  - heading "Active" [level=5] [ref=f1e430]
                - cell [ref=f1e431]:
                  - link "" [ref=f1e433] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e435]:
                - cell [ref=f1e436]:
                  - generic [ref=f1e438]:
                    - text: Audio
                    - heading [level=5] [ref=f1e439]:
                      - link "Noise Cancelling Headphones" [ref=f1e440] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e441]:
                  - text: Stock
                  - heading "25 units" [level=5] [ref=f1e442]
                - cell [ref=f1e443]:
                  - text: Price
                  - heading "$129.99" [level=5] [ref=f1e444]
                - cell [ref=f1e445]:
                  - text: Ratings
                  - heading [level=5] [ref=f1e446]:
                    - link "(78)" [ref=f1e448] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e449]:
                  - text: Status
                  - heading "Low Stock" [level=5] [ref=f1e450]
                - cell [ref=f1e451]:
                  - link "" [ref=f1e453] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e455]:
                - cell [ref=f1e456]:
                  - generic [ref=f1e458]:
                    - text: Home Tech
                    - heading [level=5] [ref=f1e459]:
                      - link "Mini Air Purifier" [ref=f1e460] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/product-details
                - cell [ref=f1e461]:
                  - text: Stock
                  - heading "0 units" [level=5] [ref=f1e462]
                - cell [ref=f1e463]:
                  - text: Price
                  - heading "$49.99" [level=5] [ref=f1e464]
                - cell [ref=f1e465]:
                  - text: Ratings
                  - heading " (34)" [level=5] [ref=f1e466]:
                    - generic [ref=f1e467]: 
                    - link "(34)" [ref=f1e470] [cursor=pointer]:
                      - /url: http://127.0.0.1:8110/admin/ecommerce/reviews
                - cell [ref=f1e471]:
                  - text: Status
                  - heading "Out of Stock" [level=5] [ref=f1e472]
                - cell [ref=f1e473]:
                  - link "" [ref=f1e475] [cursor=pointer]:
                    - /url: "#"
          - generic [ref=f1e478]:
            - generic [ref=f1e479]: Showing 1 to 7 of 9 products
            - list [ref=f1e483]:
              - listitem [ref=f1e484]:
                - link "":
                  - /url: "#"
              - listitem [ref=f1e485]:
                - link "1" [ref=f1e486] [cursor=pointer]:
                  - /url: "#"
              - listitem [ref=f1e487]:
                - link "2" [ref=f1e488] [cursor=pointer]:
                  - /url: "#"
              - listitem [ref=f1e489]:
                - link "" [ref=f1e490] [cursor=pointer]:
                  - /url: "#"
        - generic [ref=f1e493]:
          - generic [ref=f1e494]:
            - heading "Recent Orders" [level=4] [ref=f1e495]
            - generic [ref=f1e496]:
              - link " Add Order" [ref=f1e497] [cursor=pointer]:
                - /url: javascript:void(0);
                - generic [ref=f1e498]: 
                - text: Add Order
              - link " Export CSV" [ref=f1e499] [cursor=pointer]:
                - /url: javascript:void(0);
                - generic [ref=f1e500]: 
                - text: Export CSV
          - table [ref=f1e503]:
            - rowgroup [ref=f1e504]:
              - row [ref=f1e505]:
                - cell [ref=f1e506]:
                  - generic [ref=f1e508]:
                    - text: Alice Cooper
                    - heading [level=5] [ref=f1e509]:
                      - link "#ORD-2001" [ref=f1e510] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e511]:
                  - text: Product
                  - heading "Noise Cancelling Headphones" [level=5] [ref=f1e512]
                - cell [ref=f1e513]:
                  - text: Date
                  - heading "2025-05-01" [level=5] [ref=f1e514]
                - cell [ref=f1e515]:
                  - text: Amount
                  - heading "$199.99" [level=5] [ref=f1e516]
                - cell [ref=f1e517]:
                  - text: Status
                  - heading "Delivered" [level=5] [ref=f1e518]
                - cell [ref=f1e519]:
                  - link "" [ref=f1e521] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e523]:
                - cell [ref=f1e524]:
                  - generic [ref=f1e526]:
                    - text: David Lee
                    - heading [level=5] [ref=f1e527]:
                      - link "#ORD-2002" [ref=f1e528] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e529]:
                  - text: Product
                  - heading "4K Monitor" [level=5] [ref=f1e530]
                - cell [ref=f1e531]:
                  - text: Date
                  - heading "2025-04-30" [level=5] [ref=f1e532]
                - cell [ref=f1e533]:
                  - text: Amount
                  - heading "$349.00" [level=5] [ref=f1e534]
                - cell [ref=f1e535]:
                  - text: Status
                  - heading "Pending" [level=5] [ref=f1e536]
                - cell [ref=f1e537]:
                  - link "" [ref=f1e539] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e541]:
                - cell [ref=f1e542]:
                  - generic [ref=f1e544]:
                    - text: Sophia Turner
                    - heading [level=5] [ref=f1e545]:
                      - link "#ORD-2003" [ref=f1e546] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e547]:
                  - text: Product
                  - heading "Mechanical Keyboard" [level=5] [ref=f1e548]
                - cell [ref=f1e549]:
                  - text: Date
                  - heading "2025-04-29" [level=5] [ref=f1e550]
                - cell [ref=f1e551]:
                  - text: Amount
                  - heading "$89.49" [level=5] [ref=f1e552]
                - cell [ref=f1e553]:
                  - text: Status
                  - heading "Completed" [level=5] [ref=f1e554]
                - cell [ref=f1e555]:
                  - link "" [ref=f1e557] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e559]:
                - cell [ref=f1e560]:
                  - generic [ref=f1e562]:
                    - text: James Wilson
                    - heading [level=5] [ref=f1e563]:
                      - link "#ORD-2004" [ref=f1e564] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e565]:
                  - text: Product
                  - heading "Drone Camera" [level=5] [ref=f1e566]
                - cell [ref=f1e567]:
                  - text: Date
                  - heading "2025-04-28" [level=5] [ref=f1e568]
                - cell [ref=f1e569]:
                  - text: Amount
                  - heading "$450.00" [level=5] [ref=f1e570]
                - cell [ref=f1e571]:
                  - text: Status
                  - heading "Cancelled" [level=5] [ref=f1e572]
                - cell [ref=f1e573]:
                  - link "" [ref=f1e575] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e577]:
                - cell [ref=f1e578]:
                  - generic [ref=f1e580]:
                    - text: Ava Carter
                    - heading [level=5] [ref=f1e581]:
                      - link "#ORD-2005" [ref=f1e582] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e583]:
                  - text: Product
                  - heading "Wireless Earbuds" [level=5] [ref=f1e584]
                - cell [ref=f1e585]:
                  - text: Date
                  - heading "2025-04-27" [level=5] [ref=f1e586]
                - cell [ref=f1e587]:
                  - text: Amount
                  - heading "$129.99" [level=5] [ref=f1e588]
                - cell [ref=f1e589]:
                  - text: Status
                  - heading "Completed" [level=5] [ref=f1e590]
                - cell [ref=f1e591]:
                  - link "" [ref=f1e593] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e595]:
                - cell [ref=f1e596]:
                  - generic [ref=f1e598]:
                    - text: Ethan Brooks
                    - heading [level=5] [ref=f1e599]:
                      - link "#ORD-2011" [ref=f1e600] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e601]:
                  - text: Product
                  - heading "VR Headset" [level=5] [ref=f1e602]
                - cell [ref=f1e603]:
                  - text: Date
                  - heading "2025-05-02" [level=5] [ref=f1e604]
                - cell [ref=f1e605]:
                  - text: Amount
                  - heading "$299.00" [level=5] [ref=f1e606]
                - cell [ref=f1e607]:
                  - text: Status
                  - heading "Completed" [level=5] [ref=f1e608]
                - cell [ref=f1e609]:
                  - link "" [ref=f1e611] [cursor=pointer]:
                    - /url: "#"
              - row [ref=f1e613]:
                - cell [ref=f1e614]:
                  - generic [ref=f1e616]:
                    - text: Mia Clarke
                    - heading [level=5] [ref=f1e617]:
                      - link "#ORD-2012" [ref=f1e618] [cursor=pointer]:
                        - /url: http://127.0.0.1:8110/admin/ecommerce/order-details
                - cell [ref=f1e619]:
                  - text: Product
                  - heading "Portable Charger" [level=5] [ref=f1e620]
                - cell [ref=f1e621]:
                  - text: Date
                  - heading "2025-05-01" [level=5] [ref=f1e622]
                - cell [ref=f1e623]:
                  - text: Amount
                  - heading "$59.99" [level=5] [ref=f1e624]
                - cell [ref=f1e625]:
                  - text: Status
                  - heading "Completed" [level=5] [ref=f1e626]
                - cell [ref=f1e627]:
                  - link "" [ref=f1e629] [cursor=pointer]:
                    - /url: "#"
          - generic [ref=f1e632]:
            - generic [ref=f1e633]: Showing 1 to 7 of 10 orders
            - list [ref=f1e637]:
              - listitem [ref=f1e638]:
                - link "":
                  - /url: "#"
              - listitem [ref=f1e639]:
                - link "1" [ref=f1e640] [cursor=pointer]:
                  - /url: "#"
              - listitem [ref=f1e641]:
                - link "2" [ref=f1e642] [cursor=pointer]:
                  - /url: "#"
              - listitem [ref=f1e643]:
                - link "" [ref=f1e644] [cursor=pointer]:
                  - /url: "#"
    - contentinfo [ref=f1e646]:
      - generic [ref=f1e649]:
        - text: © 2026 Porichoy By
        - link "yenHunter" [ref=f1e650] [cursor=pointer]:
          - /url: https://github.com/yenHunter
```

# Test source

```ts
  1   | const path = require('node:path');
  2   | const { test, expect } = require('@playwright/test');
  3   | const { ADMIN, ACCOUNT } = require('../support/servers');
  4   | const { signIn } = require('../support/admin');
  5   | 
  6   | /**
  7   |  * The topbar account modals: profile (names and picture) and password.
  8   |  *
  9   |  * The picture round trip happens here because the client half of it cannot be
  10  |  * unit tested: the preview, the hover overlay, the recovery after a rejected
  11  |  * upload and the messages for bodies PHP rejects before Laravel sees them.
  12  |  */
  13  | 
  14  | const PICTURE = path.resolve(__dirname, '..', 'fixtures', 'sample.png');
  15  | const NOT_A_PICTURE = path.resolve(__dirname, '..', 'fixtures', 'sample.pdf');
  16  | 
  17  | const DEFAULT_AVATAR = /static\/icons\/user\.png$/;
  18  | const STORED_PICTURE = /uploads\/users\/.+\.webp$/;
  19  | 
  20  | const PROFILE_MODAL = '#account_profile_modal';
  21  | const PASSWORD_MODAL = '#account_password_modal';
  22  | 
  23  | /**
  24  |  * Assert the toast and wait for it to go away: it sits over the topbar, where
  25  |  * the next click has to land.
  26  |  */
  27  | const waitForToast = async (page, message) => {
  28  |     await expect(page.locator('.swal2-toast')).toContainText(message);
  29  |     await expect(page.locator('.swal2-container')).toHaveCount(0);
  30  | };
  31  | 
  32  | const openAccountMenu = async (page) => {
  33  |     // A closing modal and its backdrop also sit over the topbar.
> 34  |     await expect(page.locator('.modal-backdrop')).toHaveCount(0);
      |                                                   ^ Error: expect(locator).toHaveCount(expected) failed
  35  |     await expect(page.locator('.swal2-container')).toHaveCount(0);
  36  | 
  37  |     const menu = page.locator('.nav-user .dropdown-menu');
  38  | 
  39  |     if (! (await menu.isVisible())) {
  40  |         await page.click('.nav-user .dropdown-toggle');
  41  |     }
  42  | 
  43  |     await expect(menu).toBeVisible();
  44  | };
  45  | 
  46  | const openProfile = async (page) => {
  47  |     await openAccountMenu(page);
  48  |     await page.click('.nav-user .dropdown-menu a[data-bs-target="#account_profile_modal"]');
  49  |     await expect(page.locator(PROFILE_MODAL)).toBeVisible();
  50  | };
  51  | 
  52  | const openPassword = async (page) => {
  53  |     await openAccountMenu(page);
  54  |     await page.click('.nav-user .dropdown-menu a[data-bs-target="#account_password_modal"]');
  55  |     await expect(page.locator(PASSWORD_MODAL)).toBeVisible();
  56  | };
  57  | 
  58  | const saveProfile = async (page) => {
  59  |     await page.click('#account_profile_form button[type="submit"]');
  60  | };
  61  | 
  62  | const fillPasswordForm = async (page, { current, next, confirm = next }) => {
  63  |     await page.fill('#account_password_current', current);
  64  |     await page.fill('#account_password_new', next);
  65  |     await page.fill('#account_password_confirmation', confirm);
  66  | };
  67  | 
  68  | const submitPassword = async (page) => {
  69  |     await page.click('#account_password_form button[type="submit"]');
  70  | };
  71  | 
  72  | /** Make PHP reject the body before Laravel ever validates it. */
  73  | const rejectBody = async (page, status) => {
  74  |     await page.route('**/account/profile', (route) =>
  75  |         route.fulfill({
  76  |             status,
  77  |             contentType: 'application/json',
  78  |             body: JSON.stringify({ message: 'rejected by the server' }),
  79  |         })
  80  |     );
  81  | };
  82  | 
  83  | test.describe('account modals', () => {
  84  |     test('the profile modal edits the names and keeps the email read-only', async ({ page }) => {
  85  |         await signIn(page);
  86  | 
  87  |         await openAccountMenu(page);
  88  |         const menu = page.locator('.nav-user .dropdown-menu');
  89  | 
  90  |         await expect(menu.locator('.dropdown-item', { hasText: 'Profile' })).toBeVisible();
  91  |         await expect(menu.locator('.dropdown-item', { hasText: 'Change Password' })).toBeVisible();
  92  |         await expect(menu.locator('.dropdown-item', { hasText: 'Account Settings' })).toHaveCount(0);
  93  |         await expect(menu.locator('.dropdown-item', { hasText: 'Notifications' })).toHaveCount(0);
  94  | 
  95  |         await openProfile(page);
  96  | 
  97  |         // Displayed, never editable.
  98  |         const email = page.locator('#account_profile_email');
  99  |         await expect(email).toBeDisabled();
  100 |         await expect(email).toHaveValue(ADMIN.email);
  101 | 
  102 |         await page.fill('#account_profile_first_name', 'Browser');
  103 |         await page.fill('#account_profile_last_name', 'Tester');
  104 |         await saveProfile(page);
  105 | 
  106 |         await waitForToast(page, 'Your profile has been updated.');
  107 |         await expect(page.locator(PROFILE_MODAL)).toBeHidden();
  108 |         await expect(page.locator('.nav-user h5')).toHaveText('Browser');
  109 | 
  110 |         // Reopening shows what was saved, and the address is still untouched.
  111 |         await openProfile(page);
  112 |         await expect(page.locator('#account_profile_first_name')).toHaveValue('Browser');
  113 |         await expect(page.locator('#account_profile_email')).toHaveValue(ADMIN.email);
  114 | 
  115 |         // Leave the seeded account as the rest of the run expects it.
  116 |         await page.fill('#account_profile_first_name', 'E2E');
  117 |         await page.fill('#account_profile_last_name', 'Admin');
  118 |         await saveProfile(page);
  119 |         await waitForToast(page, 'Your profile has been updated.');
  120 |         await expect(page.locator('.nav-user h5')).toHaveText('E2E');
  121 |     });
  122 | 
  123 |     test('the picture is uploaded, removed from the avatar overlay and survives a rejection', async ({ page }) => {
  124 |         await signIn(page);
  125 |         await openProfile(page);
  126 | 
  127 |         const avatar = page.locator('#account_profile_avatar');
  128 |         const overlay = page.locator('#account_profile_remove_picture');
  129 | 
  130 |         // Upload: the stored file is a WebP and the topbar follows it.
  131 |         await page.setInputFiles('#account_profile_picture', PICTURE);
  132 |         await saveProfile(page);
  133 | 
  134 |         await waitForToast(page, 'Your profile has been updated.');
```