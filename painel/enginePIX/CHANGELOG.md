## [1.0.0](https://github.com/gerencianet/gn-pix-sdk-php-exemplo/releases/tag/1.0.0) - 2020-12-09

### Added

- Field "recebedor" in the "config.json" and in the "emitirPix.php" for mount the Qr Code.
- Generate txID for "solicitaDevolucaoPix.php".
 
### Changed
- Fix function `getTxID()`
- Added field "recebedor"  in the config README example.
- Case QR Code "dinamico" the txID receive `***` in the  "montaBrCode.php".
 
### Removed

- Verification of the "payload" when assembling the Qr Code.

## [0.1.0](https://github.com/gerencianet/gn-pix-sdk-php-exemplo/releases/tag/0.1.0) - 2020-11-26

- Initial release.
