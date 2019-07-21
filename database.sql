-- ESTRUTURA DE BANCO DE DADOS: https://github.com/ggrando/rdsmAPI2-php
-- Author Guilherme Grando


--
-- Estrutura da tabela `app_credentials`
--

CREATE TABLE `app_credentials` (
  `client_id` varchar(255) NOT NULL,
  `client_secret` varchar(255) NOT NULL,
  `redirect_url` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `refresh_token` varchar(255) DEFAULT NULL
) 

--
-- ATUALIZANDO DADOS DA TABELA (ESSE INSERT PODE SER FEITO A MAO)
--

INSERT INTO `app_credentials` (`client_id`, `client_secret`, `redirect_url`, `id`, `refresh_token`) VALUES
('first', 'first', 'first', 1, 'first');

-- --------------------------------------------------------

--
-- Estrutura da tabela `token_rdsm`
--

CREATE TABLE `token_rdsm` (
  `id` int(11) NOT NULL,
  `refresh` varchar(255) NOT NULL,
  `token` varchar(900) NOT NULL,
  `update_date` varchar(255) DEFAULT NULL
) 

--
-- ATUALIZANDO DADOS DA TABELA (ESSE INSERT PODE SER FEITO A MAO)
--

INSERT INTO `token_rdsm` (`id`, `refresh`, `token`, `update_date`) VALUES
(1, 'first', 'first', 'first');

-- --------------------------------------------------------

--
-- Indexes for table `app_credentials`
--
ALTER TABLE `app_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_rdsm`
--
ALTER TABLE `token_rdsm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `app_credentials`
--
ALTER TABLE `app_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `token_rdsm`
--
ALTER TABLE `token_rdsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
