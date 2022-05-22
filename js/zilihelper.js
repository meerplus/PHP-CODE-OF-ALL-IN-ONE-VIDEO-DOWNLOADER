
function r(e) {
            if (e) {
                var a, o = "3d5f1ffeadf58eb64ef57aef7e53a31e", n = "", i = s(Object.keys(e));
                return i.forEach((function(a) {
                    n += a + "=" + decodeURIComponent(e[a]) + "&"
                }
                )),
                n += "key=" + o,
                a = d(n),
                a
            }
        }

  function s(e) {
            var a, o, n, i, t = /(\d+)|(\D+)/g, r = /\d+/;
            return e.sort((function(e, s) {
                a = String(e).toLowerCase().match(t),
                o = String(s).toLowerCase().match(t);
                while (a.length && o.length)
                    if (n = a.shift(),
                    i = o.shift(),
                    r.test(n) || r.test(i)) {
                        if (!r.test(n))
                            return 1;
                        if (!r.test(i))
                            return -1;
                        if (n != i)
                            return n - i
                    } else if (n != i)
                        return n > i ? 1 : -1;
                return a.length - o.length
            }
            ))
        }

function d(e) {
            return w(u(m(e), e.length * 8))
        }

 function m(e) {
            for (var a = Array(), o = (1 << 8) - 1, n = 0; n < e.length * 8; n += 8)
                a[n >> 5] |= (e.charCodeAt(n / 8) & o) << n % 32;
            return a
        }
        function w(e) {
            for (var a = 0 ? "0123456789ABCDEF" : "0123456789abcdef", o = "", n = 0; n < 4 * e.length; n++)
                o += a.charAt(e[n >> 2] >> n % 4 * 8 + 4 & 15) + a.charAt(e[n >> 2] >> n % 4 * 8 & 15);
            return o
        }
  function p(e, a, o, n, i, t) {
            return h(v(h(h(a, e), h(n, t)), i), o)
        }
        function A(e, a, o, n, i, t, r) {
            return p(a & o | ~a & n, e, a, i, t, r)
        }
        function f(e, a, o, n, i, t, r) {
            return p(a & n | o & ~n, e, a, i, t, r)
        }
        function g(e, a, o, n, i, t, r) {
            return p(a ^ o ^ n, e, a, i, t, r)
        }
        function k(e, a, o, n, i, t, r) {
            return p(o ^ (a | ~n), e, a, i, t, r)
        }
        function h(e, a) {
            var o = (65535 & e) + (65535 & a)
              , n = (e >> 16) + (a >> 16) + (o >> 16);
            return n << 16 | 65535 & o
        }
        function v(e, a) {
            return e << a | e >>> 32 - a
        }

 function u(e, a) {
            e[a >> 5] |= 128 << a % 32,
            e[14 + (a + 64 >>> 9 << 4)] = a;
            for (var o = 1732584193, n = -271733879, i = -1732584194, t = 271733878, r = 0; r < e.length; r += 16) {
                var s = o
                  , c = n
                  , l = i
                  , d = t;
                o = A(o, n, i, t, e[r + 0], 7, -680876936),
                t = A(t, o, n, i, e[r + 1], 12, -389564586),
                i = A(i, t, o, n, e[r + 2], 17, 606105819),
                n = A(n, i, t, o, e[r + 3], 22, -1044525330),
                o = A(o, n, i, t, e[r + 4], 7, -176418897),
                t = A(t, o, n, i, e[r + 5], 12, 1200080426),
                i = A(i, t, o, n, e[r + 6], 17, -1473231341),
                n = A(n, i, t, o, e[r + 7], 22, -45705983),
                o = A(o, n, i, t, e[r + 8], 7, 1770035416),
                t = A(t, o, n, i, e[r + 9], 12, -1958414417),
                i = A(i, t, o, n, e[r + 10], 17, -42063),
                n = A(n, i, t, o, e[r + 11], 22, -1990404162),
                o = A(o, n, i, t, e[r + 12], 7, 1804603682),
                t = A(t, o, n, i, e[r + 13], 12, -40341101),
                i = A(i, t, o, n, e[r + 14], 17, -1502002290),
                n = A(n, i, t, o, e[r + 15], 22, 1236535329),
                o = f(o, n, i, t, e[r + 1], 5, -165796510),
                t = f(t, o, n, i, e[r + 6], 9, -1069501632),
                i = f(i, t, o, n, e[r + 11], 14, 643717713),
                n = f(n, i, t, o, e[r + 0], 20, -373897302),
                o = f(o, n, i, t, e[r + 5], 5, -701558691),
                t = f(t, o, n, i, e[r + 10], 9, 38016083),
                i = f(i, t, o, n, e[r + 15], 14, -660478335),
                n = f(n, i, t, o, e[r + 4], 20, -405537848),
                o = f(o, n, i, t, e[r + 9], 5, 568446438),
                t = f(t, o, n, i, e[r + 14], 9, -1019803690),
                i = f(i, t, o, n, e[r + 3], 14, -187363961),
                n = f(n, i, t, o, e[r + 8], 20, 1163531501),
                o = f(o, n, i, t, e[r + 13], 5, -1444681467),
                t = f(t, o, n, i, e[r + 2], 9, -51403784),
                i = f(i, t, o, n, e[r + 7], 14, 1735328473),
                n = f(n, i, t, o, e[r + 12], 20, -1926607734),
                o = g(o, n, i, t, e[r + 5], 4, -378558),
                t = g(t, o, n, i, e[r + 8], 11, -2022574463),
                i = g(i, t, o, n, e[r + 11], 16, 1839030562),
                n = g(n, i, t, o, e[r + 14], 23, -35309556),
                o = g(o, n, i, t, e[r + 1], 4, -1530992060),
                t = g(t, o, n, i, e[r + 4], 11, 1272893353),
                i = g(i, t, o, n, e[r + 7], 16, -155497632),
                n = g(n, i, t, o, e[r + 10], 23, -1094730640),
                o = g(o, n, i, t, e[r + 13], 4, 681279174),
                t = g(t, o, n, i, e[r + 0], 11, -358537222),
                i = g(i, t, o, n, e[r + 3], 16, -722521979),
                n = g(n, i, t, o, e[r + 6], 23, 76029189),
                o = g(o, n, i, t, e[r + 9], 4, -640364487),
                t = g(t, o, n, i, e[r + 12], 11, -421815835),
                i = g(i, t, o, n, e[r + 15], 16, 530742520),
                n = g(n, i, t, o, e[r + 2], 23, -995338651),
                o = k(o, n, i, t, e[r + 0], 6, -198630844),
                t = k(t, o, n, i, e[r + 7], 10, 1126891415),
                i = k(i, t, o, n, e[r + 14], 15, -1416354905),
                n = k(n, i, t, o, e[r + 5], 21, -57434055),
                o = k(o, n, i, t, e[r + 12], 6, 1700485571),
                t = k(t, o, n, i, e[r + 3], 10, -1894986606),
                i = k(i, t, o, n, e[r + 10], 15, -1051523),
                n = k(n, i, t, o, e[r + 1], 21, -2054922799),
                o = k(o, n, i, t, e[r + 8], 6, 1873313359),
                t = k(t, o, n, i, e[r + 15], 10, -30611744),
                i = k(i, t, o, n, e[r + 6], 15, -1560198380),
                n = k(n, i, t, o, e[r + 13], 21, 1309151649),
                o = k(o, n, i, t, e[r + 4], 6, -145523070),
                t = k(t, o, n, i, e[r + 11], 10, -1120210379),
                i = k(i, t, o, n, e[r + 2], 15, 718787259),
                n = k(n, i, t, o, e[r + 9], 21, -343485551),
                o = h(o, s),
                n = h(n, c),
                i = h(i, l),
                t = h(t, d)
            }
            return Array(o, n, i, t)
        }
           

function x(e, a) {
            var o = "88bf55248e9dc822"
              , n = a + "000";
            o = CryptoJS.enc.Utf8.parse(o),
            n = CryptoJS.enc.Utf8.parse(n);
            var i = CryptoJS.AES.encrypt(e, o, {
                iv: n,
                mode: CryptoJS.mode.CBC,
                padding: CryptoJS.pad.Pkcs7
            });
            return i.toString()
        }



function GetZiliParams(URL){




var a = {
                version_code: "20190628",
                version_name: "1.15.5.2019",
                server_code: "100",
                pkg: "puri_web",
                l: "en",
                timestamp: Date.now()
            };

	var Splits=url.split('/');

 i="type="+Splits[8]+"&id="+ Splits[7] +"&r="+Splits[9];




a.z= x(i, a.timestamp);
a.sign=r(a);



return a;

}